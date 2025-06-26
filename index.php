<?php 
/**
 * The main template file
 */

get_header(); 
?>

<main id="primary" class="site-main">
    <?php
    // Section de nouvelles
    get_template_part('inc/template-part/block-news-section', null, array(
        'title' => 'Latest News',
        'subtitle' => 'CHECK OUT SOME OF OUR NEWS',
        'posts_per_page' => 6
    ));
    ?>
</main>

<?php get_footer();
