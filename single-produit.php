<?php get_header(); ?>

<main id="main" class="site-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('produit-single'); ?>>
                <h1 class="produit-title"><?php the_title(); ?></h1>
                <div class="produit-categories">
                    <?php the_terms(get_the_ID(), 'categorie-produit'); ?>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="produit-thumb">
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

<?php get_footer(); ?>