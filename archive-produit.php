<?php get_header(); ?>

<div class="container">
    <div class="row">
        <main id="primary" class="site-main col-12">
            <header class="page-header">
                <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            </header>
            <?php if (have_posts()) : ?>
                <div class="produits-list row">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('produit-item col-md-4 mb-4'); ?>>
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="produit-thumb mb-2">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="produit-title h5"><?php the_title(); ?></h2>
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
        </main>
    </div>
</div>

<?php get_footer(); ?>