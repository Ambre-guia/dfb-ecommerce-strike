<?php
/**
 * DFB E-commerce Strike Theme Functions
 */

// Définir les constantes du thème
define('DFB_THEME_DIR', get_template_directory());
define('DFB_THEME_URI', get_template_directory_uri());

/**
 * Enqueue des styles et scripts
 */
function dfb_enqueue_styles_scripts() {
    // Styles principaux
    wp_enqueue_style('dfb-variables', get_template_directory_uri() . '/inc/css/var.css', array(), '1.0.0');
    wp_enqueue_style('dfb-main-style', get_template_directory_uri() . '/inc/css/main.css', array('dfb-variables'), '1.0.0');
    wp_enqueue_style('dfb-theme-style', get_stylesheet_uri(), array('dfb-main-style'), '1.0.0');
    
    // Scripts
    wp_enqueue_script('dfb-main-script', get_template_directory_uri() . '/inc/js/main.js', array('jquery'), '1.0.0', true);
    
    // Si WooCommerce est actif, charger les styles spécifiques
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('dfb-woocommerce-style', get_template_directory_uri() . '/inc/css/woocommerce.css', array('dfb-main-style'), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'dfb_enqueue_styles_scripts');

/**
 * Configuration du thème
 */
function dfb_theme_setup() {
    // Support des fonctionnalités WordPress
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    // Support WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Enregistrement des menus
    register_nav_menus(array(
        'primary-menu' => esc_html__('Menu Principal', 'dfb-ecommerce-strike'),
        'footer-menu'  => esc_html__('Menu Footer', 'dfb-ecommerce-strike'),
    ));
}
add_action('after_setup_theme', 'dfb_theme_setup');

/**
 * Enregistrement du Custom Post Type pour les anciens projets
 */
function dfb_register_project_cpt() {
    $labels = array(
        'name'               => _x('Projets', 'post type general name', 'dfb-ecommerce-strike'),
        'singular_name'      => _x('Projet', 'post type singular name', 'dfb-ecommerce-strike'),
        'menu_name'          => _x('Projets', 'admin menu', 'dfb-ecommerce-strike'),
        'name_admin_bar'     => _x('Projet', 'add new on admin bar', 'dfb-ecommerce-strike'),
        'add_new'            => _x('Ajouter', 'projet', 'dfb-ecommerce-strike'),
        'add_new_item'       => __('Ajouter un nouveau projet', 'dfb-ecommerce-strike'),
        'new_item'           => __('Nouveau projet', 'dfb-ecommerce-strike'),
        'edit_item'          => __('Modifier le projet', 'dfb-ecommerce-strike'),
        'view_item'          => __('Voir le projet', 'dfb-ecommerce-strike'),
        'all_items'          => __('Tous les projets', 'dfb-ecommerce-strike'),
        'search_items'       => __('Rechercher des projets', 'dfb-ecommerce-strike'),
        'parent_item_colon'  => __('Projets parents:', 'dfb-ecommerce-strike'),
        'not_found'          => __('Aucun projet trouvé.', 'dfb-ecommerce-strike'),
        'not_found_in_trash' => __('Aucun projet trouvé dans la corbeille.', 'dfb-ecommerce-strike')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'dfb-ecommerce-strike'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projet'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('projet', $args);
    
    // Enregistrement de la taxonomie pour les catégories de projets
    $taxonomy_labels = array(
        'name'              => _x('Catégories de projets', 'taxonomy general name', 'dfb-ecommerce-strike'),
        'singular_name'     => _x('Catégorie de projet', 'taxonomy singular name', 'dfb-ecommerce-strike'),
        'search_items'      => __('Rechercher des catégories', 'dfb-ecommerce-strike'),
        'all_items'         => __('Toutes les catégories', 'dfb-ecommerce-strike'),
        'parent_item'       => __('Catégorie parente', 'dfb-ecommerce-strike'),
        'parent_item_colon' => __('Catégorie parente:', 'dfb-ecommerce-strike'),
        'edit_item'         => __('Modifier la catégorie', 'dfb-ecommerce-strike'),
        'update_item'       => __('Mettre à jour la catégorie', 'dfb-ecommerce-strike'),
        'add_new_item'      => __('Ajouter une nouvelle catégorie', 'dfb-ecommerce-strike'),
        'new_item_name'     => __('Nom de la nouvelle catégorie', 'dfb-ecommerce-strike'),
        'menu_name'         => __('Catégories', 'dfb-ecommerce-strike'),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categorie-projet'),
        'show_in_rest'      => true,
    );

    register_taxonomy('categorie-projet', array('projet'), $taxonomy_args);
}
add_action('init', 'dfb_register_project_cpt');

/**
 * Fonctions WooCommerce spécifiques
 */
if (class_exists('WooCommerce')) {
    // Supprimer les styles WooCommerce par défaut pour utiliser nos propres styles
    add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    
    // Personnaliser le nombre de produits par ligne
    function dfb_woocommerce_loop_columns() {
        return 3; // 3 produits par ligne
    }
    add_filter('loop_shop_columns', 'dfb_woocommerce_loop_columns');
    
    // Personnaliser le nombre de produits par page
    function dfb_woocommerce_products_per_page() {
        return 12; // 12 produits par page
    }
    add_filter('loop_shop_per_page', 'dfb_woocommerce_products_per_page');
}

/**
 * Amélioration SEO
 */
function dfb_add_meta_tags() {
    global $post;
    
    if (is_single() || is_page()) {
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = wp_trim_words(strip_shortcodes(get_the_content()), 20, '...');
        }
        
        echo '<meta name="description" content="' . esc_attr($excerpt) . '" />' . "\n";
        
        // Open Graph tags
        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($excerpt) . '" />' . "\n";
        echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '" />' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\n";
        
        if (has_post_thumbnail()) {
            $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '" />' . "\n";
        }
    }
}
add_action('wp_head', 'dfb_add_meta_tags');

/**
 * Options de personnalisation pour le thème
 */
function dfb_customize_register($wp_customize) {
    // Section Footer
    $wp_customize->add_section('dfb_footer_section', array(
        'title'    => __('Options du footer', 'dfb-ecommerce-strike'),
        'priority' => 130,
    ));
    
    // Description du footer
    $wp_customize->add_setting('footer_description', array(
        'default'           => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_description', array(
        'label'    => __('Description du footer', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'textarea',
    ));
    
    // Adresse
    $wp_customize->add_setting('footer_address', array(
        'default'           => 'Adresse de votre entreprise',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_address', array(
        'label'    => __('Adresse', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'text',
    ));
    
    // Téléphone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '01 23 45 67 89',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_phone', array(
        'label'    => __('Téléphone', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => 'contact@votredomaine.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('footer_email', array(
        'label'    => __('Email', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'email',
    ));
    
    // Réseaux sociaux
    $wp_customize->add_setting('social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('URL Facebook', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_twitter', array(
        'label'    => __('URL Twitter', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label'    => __('URL Instagram', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_footer_section',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'dfb_customize_register');

/**
 * Ajouter des options de personnalisation au Customizer
 */
function dfb_ecommerce_strike_customize_register($wp_customize) {
    // Section pour les options de la page d'accueil
    $wp_customize->add_section('dfb_homepage_options', array(
        'title'    => __('Options de la page d\'accueil', 'dfb-ecommerce-strike'),
        'priority' => 30,
    ));
    
    // Services Section
    $wp_customize->add_setting('services_title', array(
        'default'           => 'Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_title', array(
        'label'    => __('Titre de la section Services', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('services_subtitle', array(
        'default'           => 'OUR SERVICES FOR CLIENTS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_subtitle', array(
        'label'    => __('Sous-titre de la section Services', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    // Projects Section
    $wp_customize->add_setting('projects_title', array(
        'default'           => 'Works',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('projects_title', array(
        'label'    => __('Titre de la section Projets', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('projects_subtitle', array(
        'default'           => 'Projects We Have Done',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('projects_subtitle', array(
        'label'    => __('Sous-titre de la section Projets', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    // Testimonials Section
    $wp_customize->add_setting('testimonials_title', array(
        'default'           => 'Testimonials.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonials_title', array(
        'label'    => __('Titre de la section Témoignages', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default'           => 'FEEDBACK FROM OUR CLIENTS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('testimonials_subtitle', array(
        'label'    => __('Sous-titre de la section Témoignages', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    // News Section
    $wp_customize->add_setting('news_title', array(
        'default'           => 'Latest News',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('news_title', array(
        'label'    => __('Titre de la section Actualités', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('news_subtitle', array(
        'default'           => 'CHECK OUT SOME OF OUR NEWS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('news_subtitle', array(
        'label'    => __('Sous-titre de la section Actualités', 'dfb-ecommerce-strike'),
        'section'  => 'dfb_homepage_options',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'dfb_ecommerce_strike_customize_register');