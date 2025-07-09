<?php

/**
 * The template for displaying single product
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // En-tête personnalisé pour le produit
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('inc/template-part/hero-header', null, array(
                'title' => get_the_title(),
                'subtitle' => ''
            ));
    ?>
            <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
                <article id="post-<?php the_ID(); ?>" <?php post_class('projet-item'); ?>>
                    <div class="projet-thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="projet-content">
                        <div class="projet-categories mb-2">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'categorie-produit');
                            if ($categories && !is_wp_error($categories)) :
                                foreach ($categories as $category) :
                                    echo '<span class="projet-category">' . esc_html($category->name) . '</span>';
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="projet-excerpt">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
            </div>
    <?php
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
