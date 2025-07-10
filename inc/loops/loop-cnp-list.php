<?php 
$_posts = new WP_Query( array(
    'post_type'         => 'cnp',
    'posts_per_page'    => 100,
    'meta_key'  =>  'cnp_specialite',
    'orderby' => 'meta_value',
    'order' => 'ASC'
)); 
if( $_posts->have_posts() ) :
    while ( $_posts->have_posts() ) : $_posts->the_post();
?>
<a href="<?php the_permalink();?>">
<div class="item item-cnp-card">
<?php
// Must be inside a loop.
 
if ( has_post_thumbnail() ) {
    the_post_thumbnail();
}
else {
    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
        . '/images/avatar-default.png" />';
}
?>
    <div class="member-content">
       <?php the_field('cnp_specialite');?>
    </div>
</div>
</a>
<?php
    endwhile;
    endif;
    wp_reset_postdata();
?>