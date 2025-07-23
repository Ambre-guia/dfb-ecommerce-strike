<?php
get_header();
?>

<main id="primary-content" class="site-main archive-main">
    <div class="archive-container">
        <div class="archive-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="archive-item-link">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-item'); ?>>
                            <span class="item-number">0<?php echo $wp_query->current_post + 1; ?></span>
                            <h2 class="item-title"><?php the_title(); ?></h2>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="item-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                        </article>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="no-results">Aucun projet trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>
