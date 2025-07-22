<?php

/**
 * The template for displaying product archives
 */

get_header();
?>

<main id="primary-content" class="site-main">
    <?php
    // En-tête de l'archive
    get_template_part('inc/template-part/hero-header', null, array(
        'title' => 'Nos Tarifs',
        'subtitle' => 'Découvrez notre catalogue'
    ));
    ?>

    >
    <?php if (have_posts()) : ?>
        <div class="tarifs-grid">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('projet-item'); ?>>
                    <div class="tarif-thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="tarif-content">
                        <h2 class="tarif-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="tarif-categories">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'categorie-tarif');
                            if ($categories && !is_wp_error($categories)) :
                                foreach ($categories as $category) :
                                    echo '<span class="tarif-category">' . esc_html($category->name) . '</span>';
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="tarif-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read-more">Voir le produit</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <p class="error-if">Aucun produit trouvé.</p>
    <?php endif; ?>
    </div>
</main>

<?php
get_footer();
