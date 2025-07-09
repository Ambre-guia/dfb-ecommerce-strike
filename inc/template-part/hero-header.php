<?php

/**
 * Template part pour l'en-tête de page
 *
 * @param string $title Titre de la page
 * @param string $subtitle Sous-titre de la page (optionnel)
 * @param bool $show_meta Afficher les métadonnées (date, auteur, catégories)
 * @param bool $show_projet_categories Afficher les catégories de projet
 */

// Valeurs par défaut
$title = isset($args['title']) ? $args['title'] : get_the_title();
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$show_meta = isset($args['show_meta']) ? $args['show_meta'] : false;
$show_projet_categories = isset($args['show_projet_categories']) ? $args['show_projet_categories'] : false;
?>

<div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:80px;padding-bottom:80px">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column" style="flex-basis:auto;">
            <h1 class="has-zeever-primary-color has-heading-1-font-size" style="font-weight:700;line-height:1.2;"><?php echo esc_html($title); ?></h1>

            <?php if (!empty($subtitle)) : ?>
                <p class="has-zeever-bodytext-color has-text-color"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <?php if ($show_meta) : ?>
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
            <?php endif; ?>

            <?php if ($show_projet_categories) : ?>
                <div class="projet-categories">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'categorie-projet');
                    if ($categories && !is_wp_error($categories)) :
                        foreach ($categories as $category) :
                            echo '<span class="projet-category">' . esc_html($category->name) . '</span>';
                        endforeach;
                    endif;
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>