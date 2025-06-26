<?php
/**
 * The template for displaying single projects
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            // En-tête du projet
            get_template_part('inc/template-part/hero-header', null, array(
                'title' => get_the_title(),
                'show_projet_categories' => true
            ));
            
            // Contenu principal
            get_template_part('inc/template-part/content-main', null, array(
                'show_featured_image' => true,
                'show_navigation' => true,
                'navigation_type' => 'projet'
            ));
            ?>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();