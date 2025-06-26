<?php
/**
 * Template part pour la section de projets
 *
 * @param string $title Titre de la section
 * @param string $subtitle Sous-titre de la section
 * @param int $posts_per_page Nombre de projets à afficher
 * @param string $view_all_link Lien vers tous les projets
 */

// Valeurs par défaut
$title = isset($args['title']) ? $args['title'] : 'Works';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'Projects We Have Done';
$posts_per_page = isset($args['posts_per_page']) ? $args['posts_per_page'] : 4;
$view_all_link = isset($args['view_all_link']) ? $args['view_all_link'] : get_post_type_archive_link('projet');
?>

<!-- PROJECT SECTION -->
<div class="wp-block-group has-background is-layout-constrained" style="background-color:#121212;padding-top:100px;padding-bottom:60px">
    <div class="wp-block-columns are-vertically-aligned-center is-layout-flex">
        <div class="wp-block-column is-vertically-aligned-center is-layout-flow">
            <div class="wp-block-group is-layout-flow">

                <!-- TITRES ET BOUTON -->
                <div class="wp-block-columns is-layout-flex">

                    <!-- COLONNE TITRES -->
                    <div class="wp-block-column is-layout-flow">
                        <h2 class="has-text-align-left is-style-lineseparator zeever-animate zeever-move-right zeever-delay-1 has-zeever-primary-color has-text-color has-heading-2-font-size" style="font-style:normal;font-weight:600">
                            <?php echo esc_html($title); ?>
                        </h2>
                        <h2 class="has-text-align-left zeever-animate zeever-move-right zeever-delay-3 has-zeever-secondary-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">
                            <?php echo esc_html($subtitle); ?>
                        </h2>
                    </div>

                    <!-- COLONNE BOUTON -->
                    <div class="wp-block-column is-vertically-aligned-center is-layout-flow">
                        <div class="wp-block-buttons is-content-justification-right is-layout-flex">
                            <div class="wp-block-button is-style-custombuttonborder3 zeever-animate zeever-move-left zeever-delay-1">
                                <a class="wp-block-button__link" href="<?php echo esc_url($view_all_link); ?>" style="padding:18px 30px">VIEW ALL →</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="wp-block-group has-background is-layout-constrained" style="background-color:#121212;padding-top:0px;padding-bottom:100px">
    <div class="wp-block-columns alignfull is-layout-flex">
        <div class="wp-block-column is-layout-flow">
            <div class="wp-block-group is-layout-flow">
                <div class="wp-block-columns is-layout-flex">
                    <?php 
                    $args = array(
                        'post_type' => 'projet',
                        'posts_per_page' => $posts_per_page,
                    );
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) : 
                        $delay = 1;
                        while ($query->have_posts()) : $query->the_post(); 
                    ?>
                    <div class="wp-block-column zeever-animate zeever-move-up zeever-delay-<?php echo $delay; ?> is-layout-flow">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="wp-block-image size-large">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </figure>
                        </a>
                    </div>
                    <?php
                        $delay += 2;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>