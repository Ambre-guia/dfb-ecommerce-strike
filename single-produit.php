<?php get_header(); ?>

<div class="container">
    <div class="row">
        <main id="primary" class="site-main col-12 col-md-8 mx-auto">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('produit-single'); ?>>
                        <header class="entry-header mb-4">
                            <h1 class="produit-title"><?php the_title(); ?></h1>
                            <div class="produit-categories mb-2">
                                <?php the_terms(get_the_ID(), 'categorie-produit'); ?>
                            </div>
                        </header>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="produit-thumb mb-4">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="produit-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
            <?php endwhile;
            endif; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>