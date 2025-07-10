<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Header Section -->
    <header class="mast-head">
        <div class="container">
            <?php if (has_custom_logo()) : ?>
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <?php $description = get_bloginfo('description', 'display'); ?>
                <?php if ($description || is_customize_preview()) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            <?php endif; ?>

            <nav id="main-nav" class="main-navigation">

                <button class="hamburger hamburger--emphatic" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'primary-menu',
                        'container'      => 'ul',
                        'container_class' => 'primary-menu-container',
                        'fallback_cb'     => false,
                    )
                );
                ?>
            </nav>
            <a href="#" class="donate-link">Donate</a>
        </div>
    </header>