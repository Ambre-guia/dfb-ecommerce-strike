<?php 
 $thispagename=$post->post_name;
    $terms="bureau";

    if ($thispagename == "bureau") 
    {
        $terms="bureau";
    }
    if ($thispagename == "conseil-dadministration") 
    {
        $terms="conseil-dadministration";
    }
    if ($thispagename == "assemblee-generale") 
    {
        $terms="assemblee-generale";
    }
   
    if($terms == "bureau")
    {
        $_posts = new WP_Query( array(
            'post_type'         => 'membres',
            'posts_per_page'    => 100,
            'order'             => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'member_type',
                    'field' => 'slug',
                    'terms' => $terms,
                )
            )
        ));
    }
    else{
        $_posts = new WP_Query( array(
            'post_type'         => 'membres',
            'posts_per_page'    => 100,
            'meta_key'          => 'member_lastname',
            'orderby'           => 'meta_value',
            'order'             => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'member_type',
                    'field' => 'slug',
                    'terms' => $terms,
                )
            )
        ));      
    }

if( $_posts->have_posts() ) :
while ( $_posts->have_posts() ) : $_posts->the_post();
?>

<div class="item item-member-card">
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
        <?php $cnp = get_field('member_cnp');?>
        <p class="member-role"><?php the_field('member_role');?></p>
        <h3 class="member-title"><?php the_field('member_title');?> <?php the_field('member_firstname');?> <?php the_field('member_lastname');?></h3>
        <p class="member-work"><?php the_field('member_work');?></p>
    </div>
</div>

<?php
endwhile;
endif;
wp_reset_postdata();