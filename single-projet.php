<?php
/**
 * The template for displaying single projects
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:80px;padding-bottom:80px">
                <div class="wp-block-columns is-layout-flex">
                    <div class="wp-block-column" style="flex-basis:700px;">
                        <h1 class="has-zeever-primary-color has-heading-1-font-size" style="font-weight:700;line-height:1.2;"><?php the_title(); ?></h1>
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
                    </div>
                </div>
            </div>

            <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
                <div class="wp-block-columns is-layout-flex">
                    <div class="wp-block-column">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="projet-featured-image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="projet-content">
                            <?php the_content(); ?>
                        </div>

                        <div class="projet-navigation">
                            <?php
                            the_post_navigation(
                                array(
                                    'prev_text' => '<span class="nav-subtitle">Projet précédent:</span> <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="nav-subtitle">Projet suivant:</span> <span class="nav-title">%title</span>',
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();