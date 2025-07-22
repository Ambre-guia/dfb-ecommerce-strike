<?php
get_header();
?>

<main id="primary-content" class="site-main">
    <div class="hero-header">
        <div class="container">
            <h1 class="entry-title">Nos Tarifs</h1>
            <p class="subtitle">Découvrez nos offres adaptées à vos besoins</p>
        </div>
    </div>

    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="tarifs-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('tarif-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="tarif-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="tarif-content">
                            <h2 class="tarif-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'categorie-tarif');
                            if ($categories && !is_wp_error($categories)) : ?>
                                <div class="tarif-categories">
                                    <?php foreach ($categories as $category) : ?>
                                        <span class="tarif-category"><?php echo esc_html($category->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="tarif-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'prev_text' => '&laquo; Précédent',
                'next_text' => 'Suivant &raquo;',
                'screen_reader_text' => ' '
            ));
            ?>

        <?php else : ?>
            <p class="no-results">Aucun tarif disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
