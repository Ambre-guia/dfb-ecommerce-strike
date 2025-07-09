<?php

/**
 * Template part pour la section de témoignages
 *
 * @param string $title Titre de la section
 * @param string $subtitle Sous-titre de la section
 * @param array $testimonials Tableau de témoignages
 */

// Valeurs par défaut
$title = isset($args['title']) ? $args['title'] : 'Testimonials.';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'FEEDBACK FROM OUR CLIENTS';

// Témoignages par défaut si non fournis
if (!isset($args['testimonials']) || empty($args['testimonials'])) {
    $testimonials = array(
        array(
            'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium. Nunc ut dui ornare, vulputate augue sed, varius velit.',
            'image' => get_template_directory_uri() . '/assets/img/person-people-girl-woman-hair-photography-1172571-pxhere.com.webp',
            'name' => 'John Doe',
            'position' => 'Designer'
        ),
        array(
            'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium. Nunc ut dui ornare, vulputate augue sed, varius velit.',
            'image' => get_template_directory_uri() . '/assets/img/person-people-girl-woman-hair-photography-1172571-pxhere.com.webp',
            'name' => 'Jennifer Doe',
            'position' => 'Marketing'
        ),
        array(
            'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium. Nunc ut dui ornare, vulputate augue sed, varius velit.',
            'image' => get_template_directory_uri() . '/assets/img/person-girl-woman-hair-photography-portrait-108386-pxhere.com.webp',
            'name' => 'Claudia Doe',
            'position' => 'Consultant'
        ),
        array(
            'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat bibendum turpis sit amet pretium. Nunc ut dui ornare, vulputate augue sed, varius velit.',
            'image' => get_template_directory_uri() . '/assets/img/man-person-people-lawn-photography-model-1220414-pxhere.com.webp',
            'name' => 'Steven Doe',
            'position' => 'Programmer'
        )
    );
} else {
    $testimonials = $args['testimonials'];
}
?>

<!-- REVIEW SECTION -->
<div class="wp-block-group has-zeever-third-background-color has-background is-layout-constrained" style="padding-top:100px;padding-bottom:60px">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column is-layout-flow">
            <div class="wp-block-group is-layout-flow">
                <div class="wp-block-columns is-layout-flex">
                    <div class="wp-block-column is-layout-flow">
                        <h2 class="has-text-align-left is-style-lineseparator zeever-animate zeever-move-right zeever-delay-1 has-white-color has-text-color has-heading-2-font-size"><?php echo esc_html($title); ?></h2>

                        <h2 class="has-text-align-left zeever-animate zeever-move-right zeever-delay-3 has-zeever-secondary-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase"><?php echo esc_html($subtitle); ?></h2>
                    </div>

                    <div class="wp-block-column is-layout-flow"></div>
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
                    $delay = 1;
                    foreach ($testimonials as $testimonial) :
                    ?>
                        <div class="wp-block-column zeever-animate zeever-move-up zeever-delay-<?php echo $delay; ?> is-layout-flow">
                            <div class="wp-block-group has-border-color has-zeever-border-border-color has-black-background-color has-background" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;border-style:solid;border-width:1px;padding-top:40px;padding-right:40px;padding-bottom:80px;padding-left:40px">
                                <div class="wp-block-columns is-layout-flex">
                                    <div class="wp-block-column is-layout-flow">
                                        <figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo get_template_directory_uri(); ?>/asset/images/quote.webp" alt="" class="wp-image-136" width="60"></figure>
                                    </div>
                                </div>

                                <p class="has-text-align-center has-zeever-bodytext-color has-text-color has-tiny-font-size"><em><?php echo esc_html($testimonial['quote']); ?></em></p>
                            </div>

                            <figure class="wp-block-image aligncenter size-full is-resized zeever-margin-top-n40 is-style-rounded" style="border-radius:50px"><img src="<?php echo esc_url($testimonial['image']); ?>" alt="<?php echo esc_attr($testimonial['name']); ?>" width="70" height="70"></figure>

                            <h2 class="has-text-align-center has-white-color has-text-color has-tiny-font-size" style="margin-top:15px"><?php echo esc_html($testimonial['name']); ?></h2>

                            <h2 class="has-text-align-center has-zeever-bodytext-color has-text-color" style="font-size:14px;font-style:normal;font-weight:400;line-height:0"><?php echo esc_html($testimonial['position']); ?></h2>
                        </div>
                    <?php
                        $delay += 2;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>