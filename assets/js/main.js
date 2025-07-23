jQuery(document).ready(function () {
  init();
});

function init() {
  initEvents();
  initTriggers();
  initSlider();
}

function initEvents() {
  //menu top
  jQuery(".mast-head .hamburger").click(function (event) {
    jQuery(this).toggleClass("is-active");

    jQuery("body").toggleClass("menu-collapse");
    jQuery(".ui-helper-hidden-accessible").hide();
  });

  //submenu top
  jQuery("body .mast-head nav a").click(function (event) {
    // console.log('ok');
    if (jQuery(".hamburger").hasClass("is-active")) {
      jQuery(".hamburger").toggleClass("is-active");
      jQuery("body").toggleClass("menu-collapse");
    }
  });

  // menu latéral
  jQuery(".sidebar-nav > ul > li > a").click(function (event) {
    event.preventDefault();
    console.log("ok");
    jQuery(this).parent("li").children("div").slideToggle();
    jQuery(this).toggleClass("active");
  });
}

function initTriggers() {
  if (jQuery(".news-slider")[0]) {
    var slider = tns({
      container: ".news-slider",
      controls: false,
      navPosition: "bottom",
      navPosition: "bottom",
      items: 1,
      edgePadding: 60,
      gutter: 30,
      mouseDrag: true,
      responsive: {
        640: {
          edgePadding: 30,
          gutter: 15,
          items: 2,
        },
        768: {
          items: 2,
          edgePadding: 60,
          gutter: 15,
        },
        992: {
          items: 3,
          gutter: 30,
          edgePadding: 0,
        },
      },
    });
  }
}

function initSlider() {
  const displacementSlider = function (opts) {
    let vertex = `
      varying vec2 vUv;
      void main() {
        vUv = uv;
        gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
      }
  `;

    let fragment = `
      
      varying vec2 vUv;

      uniform sampler2D currentImage;
      uniform sampler2D nextImage;

      uniform float dispFactor;

      void main() {

          vec2 uv = vUv;
          vec4 _currentImage;
          vec4 _nextImage;
          float intensity = 0.3;

          vec4 orig1 = texture2D(currentImage, uv);
          vec4 orig2 = texture2D(nextImage, uv);
          
          _currentImage = texture2D(currentImage, vec2(uv.x, uv.y + dispFactor * (orig2 * intensity)));

          _nextImage = texture2D(nextImage, vec2(uv.x, uv.y + (1.0 - dispFactor) * (orig1 * intensity)));

          vec4 finalTexture = mix(_currentImage, _nextImage, dispFactor);

          gl_FragColor = finalTexture;

      }
  `;

    let images = opts.images,
      image,
      sliderImages = [];
    let canvasWidth = images[0].clientWidth;
    let canvasHeight = images[0].clientHeight;
    let parent = opts.parent;
    let renderWidth = Math.max(
      document.documentElement.clientWidth,
      window.innerWidth || 0
    );
    let renderHeight = Math.max(
      document.documentElement.clientHeight,
      window.innerHeight || 0
    );

    let renderW, renderH;

    if (renderWidth > canvasWidth) {
      renderW = renderWidth;
    } else {
      renderW = canvasWidth;
    }

    renderH = canvasHeight;

    let renderer = new THREE.WebGLRenderer({
      antialias: false,
    });

    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setClearColor(0x23272a, 1.0);
    renderer.setSize(renderW, renderH);
    parent.appendChild(renderer.domElement);

    let loader = new THREE.TextureLoader();
    loader.crossOrigin = "anonymous";

    images.forEach((img) => {
      image = loader.load(img.getAttribute("src") + "?v=" + Date.now());
      image.magFilter = image.minFilter = THREE.LinearFilter;
      image.anisotropy = renderer.capabilities.getMaxAnisotropy();
      sliderImages.push(image);
    });

    let scene = new THREE.Scene();
    scene.background = new THREE.Color(0x23272a);
    let camera = new THREE.OrthographicCamera(
      renderWidth / -2,
      renderWidth / 2,
      renderHeight / 2,
      renderHeight / -2,
      1,
      1000
    );

    camera.position.z = 1;

    let mat = new THREE.ShaderMaterial({
      uniforms: {
        dispFactor: { type: "f", value: 0.0 },
        currentImage: { type: "t", value: sliderImages[0] },
        nextImage: { type: "t", value: sliderImages[1] },
      },
      vertexShader: vertex,
      fragmentShader: fragment,
      transparent: true,
      opacity: 1.0,
    });

    let geometry = new THREE.PlaneBufferGeometry(
      parent.offsetWidth,
      parent.offsetHeight,
      1
    );
    let object = new THREE.Mesh(geometry, mat);
    object.position.set(0, 0, 0);
    scene.add(object);

    let addEvents = function () {
      let pagButtons = Array.from(
        document.getElementById("pagination").querySelectorAll("button")
      );
      let isAnimating = false;

      pagButtons.forEach((el) => {
        el.addEventListener("click", function () {
          if (!isAnimating) {
            isAnimating = true;

            document
              .getElementById("pagination")
              .querySelectorAll(".active")[0].className = "btn-slider";
            this.className = "btn-slider active";

            let slideId = parseInt(this.dataset.slide, 10);

            mat.uniforms.nextImage.value = sliderImages[slideId];
            mat.uniforms.nextImage.needsUpdate = true;

            TweenLite.to(mat.uniforms.dispFactor, 1, {
              value: 1,
              ease: "Expo.easeInOut",
              onComplete: function () {
                mat.uniforms.currentImage.value = sliderImages[slideId];
                mat.uniforms.currentImage.needsUpdate = true;
                mat.uniforms.dispFactor.value = 0.0;
                isAnimating = false;
              },
            });

            let slideTitleEl = document.getElementById("slide-title");
            let slideStatusEl = document.getElementById("slide-status");
            let nextSlideTitle = document.querySelectorAll(
              `[data-slide-title="${slideId}"]`
            )[0].innerHTML;
            let nextSlideStatus = document.querySelectorAll(
              `[data-slide-status="${slideId}"]`
            )[0].innerHTML;

            TweenLite.fromTo(
              slideTitleEl,
              0.5,
              {
                autoAlpha: 1,
                y: 0,
              },
              {
                autoAlpha: 0,
                y: 20,
                ease: "Expo.easeIn",
                onComplete: function () {
                  slideTitleEl.innerHTML = nextSlideTitle;

                  TweenLite.to(slideTitleEl, 0.5, {
                    autoAlpha: 1,
                    y: 0,
                  });
                },
              }
            );

            TweenLite.fromTo(
              slideStatusEl,
              0.5,
              {
                autoAlpha: 1,
                y: 0,
              },
              {
                autoAlpha: 0,
                y: 20,
                ease: "Expo.easeIn",
                onComplete: function () {
                  slideStatusEl.innerHTML = nextSlideStatus;

                  TweenLite.to(slideStatusEl, 0.5, {
                    autoAlpha: 1,
                    y: 0,
                    delay: 0.1,
                  });
                },
              }
            );
          }
        });
      });
    };

    addEvents();

    window.addEventListener("resize", function (e) {
      renderer.setSize(renderW, renderH);
    });

    let animate = function () {
      requestAnimationFrame(animate);

      renderer.render(scene, camera);
    };
    animate();
  };

  imagesLoaded(document.querySelectorAll("img"), () => {
    document.body.classList.remove("loading");

    const el = document.getElementById("slider");
    const imgs = Array.from(el.querySelectorAll("img"));

    // Initialiser les textes au chargement
    const slideTitleEl = document.getElementById("slide-title");
    const slideStatusEl = document.getElementById("slide-status");
    const initialTitle = document.querySelector(
      '[data-slide-title="0"]'
    ).innerHTML;
    const initialStatus = document.querySelector(
      '[data-slide-status="0"]'
    ).innerHTML;

    slideTitleEl.innerHTML = initialTitle;
    slideStatusEl.innerHTML = initialStatus;

    new displacementSlider({
      parent: el,
      images: imgs,
    });
  });
}

// Kinetic cursor and image effects for archive pages
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.archive-main')) {
        initArchiveEffects();
    }
});

function initArchiveEffects() {
    // Create kinetic cursor
    const cursor = document.createElement('div');
    cursor.classList.add('kinetic-cursor');
    document.body.appendChild(cursor);

    // Mouse movement tracking
    let mouseX = 0;
    let mouseY = 0;
    let cursorX = 0;
    let cursorY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    // Smooth cursor animation
    function animateCursor() {
        const speed = 0.15;
        cursorX += (mouseX - cursorX) * speed;
        cursorY += (mouseY - cursorY) * speed;
        
        cursor.style.left = cursorX + 'px';
        cursor.style.top = cursorY + 'px';
        
        requestAnimationFrame(animateCursor);
    }
    animateCursor();

    // Archive item interactions
    const archiveItems = document.querySelectorAll('.archive-item-link');
    
    archiveItems.forEach((item, index) => {
        const thumbnail = item.querySelector('.item-thumbnail');
        
        item.addEventListener('mouseenter', () => {
            cursor.classList.add('hover');
            
            // Add kinetic movement to thumbnail
            if (thumbnail) {
                thumbnail.style.transform = `translateY(-50%) scale(1) rotate(${Math.random() * 4 - 2}deg)`;
            }
        });

        item.addEventListener('mouseleave', () => {
            cursor.classList.remove('hover');
            
            if (thumbnail) {
                thumbnail.style.transform = 'translateY(-50%) scale(0.8) rotate(-5deg)';
            }
        });

        // Dynamic thumbnail positioning based on mouse
        item.addEventListener('mousemove', (e) => {
            if (thumbnail) {
                const rect = item.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const moveX = (x / rect.width - 0.5) * 20;
                const moveY = (y / rect.height - 0.5) * 10;
                
                thumbnail.style.transform = `translateY(-50%) scale(1) rotate(${moveX * 0.1}deg) translateX(${moveX}px) translateY(${moveY}px)`;
            }
        });
    });
}
