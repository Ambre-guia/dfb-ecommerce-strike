<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            // En-tête de la page
            get_template_part('inc/template-part/hero-header', null, array(
                'title' => get_the_title()
            ));
            
            // Contenu principal
            get_template_part('inc/template-part/content-main', null, array(
                'show_featured_image' => !is_front_page(),
                'show_navigation' => false
            ));
            ?>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
