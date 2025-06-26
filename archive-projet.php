<?php
/**
 * The template for displaying project archives
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:80px;padding-bottom:80px">
        <div class="wp-block-columns is-layout-flex">
            <div class="wp-block-column" style="flex-basis:700px;">
                <h1 class="has-zeever-primary-color has-heading-1-font-size" style="font-weight:700;line-height:1.2;">Nos Projets</h1>
                <p class="has-zeever-bodytext-color has-text-color">Découvrez nos réalisations précédentes</p>
            </div>
        </div>
    </div>

    <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
        <?php if (have_posts()) : ?>
            <div class="projets-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('projet-item'); ?>>
                        <div class="projet-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="projet-content">
                            <h2 class="has-zeever-primary-color has-text-color">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="projet-categories">
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'categorie-projet');
                                if ($categories && !is_wp_error($categories)) :
                                    foreach ($categories as $category) :
                                        echo '<span class="projet-category">' . esc_html($category->name) . '</span>';
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <div class="projet-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">Voir le projet</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>
            <p class="has-zeever-bodytext-color has-text-color">Aucun projet trouvé.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();