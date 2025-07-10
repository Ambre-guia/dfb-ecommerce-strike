<?php 
$thispagename=$post->post_name;

$_posts = new WP_Query( array(
    'post_type'         => 'membres',
    'posts_per_page'    => 100,
    'order'             => 'ASC'
));

if( $_posts->have_posts() ) :
    echo '<table>';
    echo '<thead>';
    if ($thispagename === "assemblee-generale"){
        echo '<tr><th>CNP</th><th>Représentant hospitalier</th><th>Représentant libéral</th></tr>';

    }
    if ($thispagename === "conseil-dadministration"){
        echo '<tr><th>CNP</th><th>Représentant</th></tr>';
    }
    echo '</thead>';
    echo '<tbody>';
    echo '</tbody>';

    while ( $_posts->have_posts() ) : $_posts->the_post();

        if ($thispagename == "assemblee-generale") 
        {
            if( get_field('member_activity') == "Salarié")  
            $sal .=  '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';

            if( get_field('member_activity') == "Libéral") 
            $lib .= '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';
        }
        if ($thispagename == "conseil-dadministration") 
        {
            $txt = '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';
        }
    endwhile; 
        if($thispagename == "assemblee-generale"){
            echo '<td>'.$sal.'</td>';
            echo '<td>'.$lib.'</td>';
        }
        if($thispagename == "conseil-dadministration"){
            echo '<td>'.$txt.'</td>';
        }
    else
        if($thispagename == "assemblee-generale"){
            echo '<td></td>';
            echo '<td></td>';
        }
        if($thispagename == "conseil-dadministration"){
            echo '<td></td>';
        }                
        wp_reset_postdata(); 
    endif;
        echo    '</tr>';  
    endwhile;

    echo '</table>';
endif;
wp_reset_postdata();

?>