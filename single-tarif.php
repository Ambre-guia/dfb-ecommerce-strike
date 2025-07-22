<?php
get_header();
?>

<main id="primary-content" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('tarif-single'); ?>>
        <div class="hero-header">
            <div class="container">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php
                $categories = get_the_terms(get_the_ID(), 'categorie-tarif');
                if ($categories && !is_wp_error($categories)) : ?>
                    <div class="tarif-categories">
                        <?php foreach ($categories as $category) : ?>
                            <span class="tarif-category"><?php echo esc_html($category->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

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