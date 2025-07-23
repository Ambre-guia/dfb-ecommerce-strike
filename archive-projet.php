<?php
get_header();

// Récupérer toutes les catégories de projets
$categories = get_terms(array(
    'taxonomy' => 'categorie-projet',
    'hide_empty' => true,
));

// Récupérer la catégorie active si elle existe
$active_category = get_query_var('categorie-projet');
?>

<main id="primary-content" class="site-main archive-main">
    <div class="archive-container">
        <!-- Filtres par catégories -->
        <div class="archive-filters">
            <button class="filter-btn <?php echo empty($active_category) ? 'active' : ''; ?>" data-filter="all">
                Tous les projets
            </button>
            <?php if ($categories && !is_wp_error($categories)) : ?>
                <?php foreach ($categories as $category) : ?>
                    <button class="filter-btn <?php echo ($active_category === $category->slug) ? 'active' : ''; ?>" 
                            data-filter="<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="archive-list" id="archive-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $post_categories = get_the_terms(get_the_ID(), 'categorie-projet');
                    $category_classes = '';
                    if ($post_categories && !is_wp_error($post_categories)) {
                        $category_slugs = wp_list_pluck($post_categories, 'slug');
                        $category_classes = 'category-' . implode(' category-', $category_slugs);
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="archive-item-link <?php echo $category_classes; ?>">
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
