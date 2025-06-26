<?php
/**
 * The Template for displaying product archives, including the main shop page
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header">
    <div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-top:80px;padding-bottom:80px">
        <div class="wp-block-columns is-layout-flex">
            <div class="wp-block-column" style="flex-basis:700px;">
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                    <h1 class="woocommerce-products-header__title page-title has-zeever-primary-color has-heading-1-font-size" style="font-weight:700;line-height:1.2;"><?php woocommerce_page_title(); ?></h1>
                <?php endif; ?>

                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 */
                do_action('woocommerce_archive_description');
                ?>
            </div>
        </div>
    </div>
</header>

<div class="wp-block-group has-black-background-color has-background is-layout-constrained" style="padding-bottom:100px;">
    <div class="wp-block-columns is-layout-flex">
        <div class="wp-block-column">
            <?php
            if (woocommerce_product_loop()) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 */
                do_action('woocommerce_before_shop_loop');

                woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 */
                do_action('woocommerce_after_shop_loop');
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 */
                do_action('woocommerce_no_products_found');
            }
            ?>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action('woocommerce_after_main_content');

get_footer('shop');