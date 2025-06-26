<?php
/**
 * The Template for displaying all single products
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 */
do_action('woocommerce_before_main_content');

?>

<div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:50px;padding-bottom:100px;">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action('woocommerce_after_main_content');

get_footer('shop');