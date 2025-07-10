
<?php
function alfred_widgets_init() {
    register_sidebar( array(
		'name' => 'Sidebar Left',
		'id' => 'page_nav',
		'before_widget' => ' <nav class="sidebar-nav">',
		'after_widget' => ' </li><ul></nav>',
		'before_title' => '<ul><li class="active"><a href="#">',
		'after_title' => '</a>',
	) );

    register_sidebar( array(
        'name' => __( 'Sidebar Right', 'wpb' ),
        'id' => 'sidebar_blog',
        'description' => __( 'Sidebar Right', 'wpb' ),
        'before_widget' => '<div id="%1$s" class="sidebar-block %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="item-title">',
        'after_title' => '</p>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer one', 'wpb' ),
        'id' => 'footer_1',
        'description' => __( 'Footer first', 'wpb' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Footer two', 'wpb' ),
        'id' => 'footer_2',
        'description' => __( 'Footer two', 'wpb' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer three', 'wpb' ),
        'id' => 'footer_3',
        'description' => __( 'Footer 3', 'wpb' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>', 
    ) );
 
    register_sidebar( array(
        'name' => __( 'Footer four', 'wpb' ),
        'id' => 'footer_4',
        'description' => __( 'Footer 4', 'wpb' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-title">',
        'after_title' => '</h3>',
    ) );


}
 
add_action( 'widgets_init', 'alfred_widgets_init' );