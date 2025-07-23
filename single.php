<?php

/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="primary-content" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
        <div class="hero-header">
            <div class="container">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <?php if (has_category()) : ?>
                        <span class="post-categories">
                            <?php the_category(', '); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image-container">
                <div class="container">
                    <div class="featured-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
</main>

<?php
get_footer();
?>
