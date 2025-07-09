<?php

/**
 * Template part pour la section de services
 *
 * @param string $title Titre de la section
 * @param string $subtitle Sous-titre de la section
 * @param array $services Tableau de services
 */

// Valeurs par défaut
$title = isset($args['title']) ? $args['title'] : 'Services';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'OUR SERVICES FOR CLIENTS';

// Services par défaut si non fournis
if (!isset($args['services']) || empty($args['services'])) {
    $services = array(
        array(
            'title' => 'Marketing Strategy',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium.',
            'image' => 'https://wp-themes.com/wp-content/themes/zeever/assets/img/strategy.webp'
        ),
        array(
            'title' => 'Web Development',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium.',
            'image' => 'https://wp-themes.com/wp-content/themes/zeever/assets/img/web.webp'
        ),
        array(
            'title' => 'Social Media',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium.',
            'image' => 'https://wp-themes.com/wp-content/themes/zeever/assets/img/content.webp'
        )
    );
} else {
    $services = $args['services'];
}
?>

<div class="wp-block-group has-zeever-bgsoft-background-color has-background is-layout-constrained" style="padding-top:100px;padding-bottom:100px">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column is-layout-flow">

            <!-- TITRES -->
            <div class="wp-block-columns is-layout-flex">
                <div class="wp-block-column is-layout-flow">
                    <h2 class="has-text-align-left is-style-lineseparator zeever-animate zeever-move-right zeever-delay-1 has-zeever-primary-color has-text-color has-heading-2-font-size">
                        <?php echo esc_html($title); ?>
                    </h2>
                    <h2 class="has-text-align-left zeever-animate zeever-move-right zeever-delay-3 has-zeever-secondary-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">
                        <?php echo esc_html($subtitle); ?>
                    </h2>
                </div>
                <div class="wp-block-column is-layout-flow"></div>
            </div>

            <!-- SERVICES -->
            <div class="wp-block-columns is-layout-flex wp-services-section">
                <?php
                $delay = 1;
                foreach ($services as $service) :
                ?>
                    <div class="wp-block-column zeever-animate zeever-move-up zeever-delay-<?php echo $delay; ?> is-layout-flow">
                        <div class="wp-block-group has-black-background-color has-background" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url($service['image']); ?>" alt="<?php echo esc_attr($service['title']); ?>">
                            </figure>
                            <h3 class="has-text-align-left has-white-color has-text-color has-heading-4-font-size wp-block-heading" style="margin-top:20px;margin-bottom:20px">
                                <?php echo esc_html($service['title']); ?>
                            </h3>
                            <p class="has-text-align-left has-zeever-bodytext-color has-text-color has-tiny-font-size">
                                <?php echo esc_html($service['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php
                    $delay += 2;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>