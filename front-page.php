<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // Hero section
    get_template_part('inc/template-part/hero-frontpage');
    
    // Services section
    get_template_part('inc/template-part/block-services-section', null, array(
        'title' => get_theme_mod('services_title', 'Services'),
        'subtitle' => get_theme_mod('services_subtitle', 'OUR SERVICES FOR CLIENTS')
    ));
    
    // Projects section
    get_template_part('inc/template-part/block-projects-section', null, array(
        'title' => get_theme_mod('projects_title', 'Works'),
        'subtitle' => get_theme_mod('projects_subtitle', 'Projects We Have Done'),
        'posts_per_page' => 4
    ));
    
    // Testimonials section
    get_template_part('inc/template-part/block-testimonials-section', null, array(
        'title' => get_theme_mod('testimonials_title', 'Testimonials.'),
        'subtitle' => get_theme_mod('testimonials_subtitle', 'FEEDBACK FROM OUR CLIENTS')
    ));
    
    // News section
    get_template_part('inc/template-part/block-news-section', null, array(
        'title' => get_theme_mod('news_title', 'Latest News'),
        'subtitle' => get_theme_mod('news_subtitle', 'CHECK OUT SOME OF OUR NEWS'),
        'posts_per_page' => 3
    ));
    ?>
</main>

<?php
get_footer();