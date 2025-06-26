<?php
/**
 * Template part pour la section de nouvelles
 *
 * @param string $title Titre de la section
 * @param string $subtitle Sous-titre de la section
 * @param int $posts_per_page Nombre d'articles à afficher
 */

// Valeurs par défaut
$title = isset($args['title']) ? $args['title'] : 'Latest News';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'CHECK OUT SOME OF OUR NEWS';
$posts_per_page = isset($args['posts_per_page']) ? $args['posts_per_page'] : 3;
?>

<!-- NEWS SECTION -->
<div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:100px;padding-bottom:100px">
    <h2 class="has-text-align-center zeever-animate zeever-move-up zeever-delay-1 has-white-color has-text-color has-heading-2-font-size"><?php echo esc_html($title); ?></h2>

    <h1 class="has-text-align-center zeever-animate zeever-move-up zeever-delay-3 has-zeever-secondary-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:500;line-height:1.2;text-transform:capitalize;margin-right:0px;margin-bottom:60px"><?php echo esc_html($subtitle); ?></h1>

    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
    );
    $query = new WP_Query($args);
    
    if ($query->have_posts()) : 
    ?>
    <div class="wp-block-query zeever-post-template-gap is-layout-flow">
        <ul class="is-flex-container columns-3 zeever-animate zeever-move-up zeever-delay-5 wp-block-post-template is-layout-flow">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li class="wp-block-post">
                <div style="font-size:14px;" class="wp-block-post-date has-text-color has-zeever-bodytext-color"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo get_the_date(); ?></time>
                </div>
                <h2 style="font-style:normal;font-weight:500;" class="has-link-color wp-block-post-title has-large-font-size"><a href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
                </h2>
                <div style="margin-top:20px;margin-bottom:20px;" class="has-link-color wp-block-post-excerpt has-text-color has-zeever-bodytext-color">
                    <p class="wp-block-post-excerpt__excerpt"><?php the_excerpt(); ?></p>
                    <p class="wp-block-post-excerpt__more-text"><a class="wp-block-post-excerpt__more-link" href="<?php the_permalink(); ?>">Read More</a>
                    </p>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php endif; ?>
</div>