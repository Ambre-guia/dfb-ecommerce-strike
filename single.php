<?php
/**
 * The template for displaying all single posts
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
                        <div class="entry-meta">
                            <span class="posted-on">
                                <?php echo esc_html(get_the_date()); ?>
                            </span>
                            <span class="byline">
                                <?php echo esc_html__('Par', 'dfb-ecommerce-strike'); ?> <?php the_author(); ?>
                            </span>
                            <?php
                            $categories_list = get_the_category_list(', ');
                            if ($categories_list) :
                            ?>
                                <span class="cat-links">
                                    <?php echo $categories_list; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
                <div class="wp-block-columns is-layout-flex">
                    <div class="wp-block-column">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <div class="entry-footer">
                            <?php
                            $tags_list = get_the_tag_list('', ', ');
                            if ($tags_list) :
                            ?>
                                <div class="tags-links">
                                    <span class="tags-title"><?php echo esc_html__('Tags:', 'dfb-ecommerce-strike'); ?></span>
                                    <?php echo $tags_list; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="post-navigation">
                            <?php
                            the_post_navigation(
                                array(
                                    'prev_text' => '<span class="nav-subtitle">Article précédent:</span> <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="nav-subtitle">Article suivant:</span> <span class="nav-title">%title</span>',
                                )
                            );
                            ?>
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
