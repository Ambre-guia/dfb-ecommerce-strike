<?php
function dfb_register_menus()
{
    register_nav_menus(array(
        'primary-menu' => esc_html__('Menu Principal', 'dfb-ecommerce-strike'),
        'footer-menu'  => esc_html__('Menu Footer', 'dfb-ecommerce-strike'),
    ));
}
add_action('init', 'dfb_register_menus');
