<?php
/**
 * Template part pour le contenu principal
 *
 * @param bool $show_featured_image Afficher l'image mise en avant
 * @param bool $show_navigation Afficher la navigation entre articles
 * @param string $navigation_type Type de navigation ('post' ou 'projet')
 * @param bool $hide_tags Masquer les tags (pour les articles)
 */

// Valeurs par défaut
$show_featured_image = isset($args['show_featured_image']) ? $args['show_featured_image'] : true;
$show_navigation = isset($args['show_navigation']) ? $args['show_navigation'] : false;
$navigation_type = isset($args['navigation_type']) ? $args['navigation_type'] : 'post';
$hide_tags = isset($args['hide_tags']) ? $args['hide_tags'] : false;
?>

<div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column">
            <?php if ($show_featured_image && has_post_thumbnail()) : ?>
                <div class="<?php echo is_singular('projet') ? 'projet-featured-image' : 'post-featured-image'; ?>">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>

            <div class="<?php echo is_singular('projet') ? 'projet-content' : 'entry-content'; ?>">
                <?php the_content(); ?>
            </div>

            <?php if (is_singular('post') && !$hide_tags) : ?>
                <div class="entry-footer">
                    <?php
                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list) :
                    ?>
                        <div class="tags-links">
                            <span class="tags-title"><?php echo esc_html__('Tags:', 'dfb-ecommerce-strike'); ?></span>
                            <?php echo $tags_list; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($show_navigation) : ?>
                <div class="<?php echo $navigation_type === 'projet' ? 'projet-navigation' : 'post-navigation'; ?>">
                    <?php
                    if ($navigation_type === 'projet') {
                        the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">Projet précédent:</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">Projet suivant:</span> <span class="nav-title">%title</span>',
                            )
                        );
                    } else {
                        the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">Article précédent:</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">Article suivant:</span> <span class="nav-title">%title</span>',
                            )
                        );
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </div>
</div>