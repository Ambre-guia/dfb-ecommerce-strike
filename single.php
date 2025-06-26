<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            // En-tête de l'article
            get_template_part('inc/template-part/hero-header', null, array(
                'title' => get_the_title(),
                'show_meta' => true
            ));
            
            // Contenu principal
            get_template_part('inc/template-part/content-main', null, array(
                'show_featured_image' => true,
                'show_navigation' => true,
                'navigation_type' => 'post'
            ));
            ?>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
