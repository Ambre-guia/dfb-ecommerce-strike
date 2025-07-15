<?php

function my_load_scripts()
{
	wp_enqueue_script('fa', '//kit.fontawesome.com/055cc960f1.js');
	wp_enqueue_script('aos', '//unpkg.com/aos@2.3.1/dist/aos.js');
	wp_enqueue_script('tree', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r83/three.js', array(), null, true);
	wp_enqueue_script('image-loaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.js', array('jquery'), null, true);
	wp_enqueue_script('webgl-slider', get_template_directory_uri() . '/assets/js/webgl-slider.js', array('tree', 'imagesloaded'), '1.0', true);
	wp_enqueue_script('tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js');
	wp_enqueue_script('tiny-slider', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js');
	wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/vendor/jquery.countdown.min.js', array('jquery'));
	wp_enqueue_script('lightgallery', get_template_directory_uri()  . '/assets/vendor/lightgallery/lightgallery.min.js');
	wp_enqueue_script('lg-thumbnail', get_template_directory_uri()  . '/assets/vendor/lightgallery/plugins/thumbnail/lg-thumbnail.min.js');
	wp_enqueue_script('lg-zoom', get_template_directory_uri()  . '/assets/vendor/lightgallery/plugins/zoom/lg-zoom.min.js');
	wp_enqueue_script('main', get_template_directory_uri()  . '/assets/js/main.js');
	wp_enqueue_script('hamburgers', get_template_directory_uri()  . '/assets/vendor/hamburgers.js');
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_load_scripts", 11);
