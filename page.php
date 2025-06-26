<?php
/**
 * The template for displaying all pages
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
                    </div>
                </div>
            </div>

            <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
                <div class="wp-block-columns is-layout-flex">
                    <div class="wp-block-column">
                        <?php if (has_post_thumbnail() && !is_front_page()) : ?>
                            <div class="page-featured-image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
