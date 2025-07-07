<?php
<?php get_header(); ?>

<main id="main" class="site-main">
    <section class="produits-archive">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php if (have_posts()) : ?>
            <div class="produits-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('produit-item'); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="produit-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h2 class="produit-title"><?php the_title(); ?></h2>
                        </a>
                        <div class="produit-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="produit-categories">
                            <?php the_terms(get_the_ID(), 'categorie-produit'); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php _e('Aucun produit trouvé.', 'dfb-ecommerce-strike'); ?></p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>