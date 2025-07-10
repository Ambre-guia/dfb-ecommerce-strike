
<?php 

/* Loop qui affiche les différents CNP avec à chaque fois leurs représentants */

?>
ee"
<?php 

$pagename = $post->post_name;


$_posts = new WP_Query( array(
    'post_type'         => 'cnp',
    'posts_per_page'    => 100,
    'meta_key'  =>  'cnp_specialite',
    'orderby' => 'meta_value',
    'order' => 'ASC',
));

if( $_posts->have_posts() ) :
    echo '<table>';
    echo '<thead>';
    if ($pagename == "assemblee-generale") 
    echo '<tr><th>Instance</th><th>Représentant hospitalier</th><th>Représentant libéral</th></tr>';
    if ($pagename == "conseil-dadministration") 
    echo '<tr><th>Instance</th><th>Représentant</th></tr>'
    echo '</thead>';
    echo '<tbody>';
    echo '</tbody>';

    while ( $_posts->have_posts() ) : $_posts->the_post();

        $title = get_field('cnp_specialite');
        $cnpID =  get_the_ID();
        $sal="";
        $lib="";

        echo    '<tr>'; // ouverture tableau
        echo    '<td>'.$title.'</td>'; // affichage du nom du CNP

        // requete croisée pour aller chercher les représentants dans les membres via une meta query sur le champ ACF member_cnp
        $your_custom_query = new WP_Query(array(
            'post_type'         => 'membres',
            'posts_per_page'    => 10,
            'meta_query' => array(
                array(
                  'key' => 'member_cnp',
                  'value' => $cnpID,
                  'compare' => 'LIKE'
                )
            ),        
            'tax_query' => array(
            array(
                'taxonomy' => 'member_type',
                'field'    => 'slug',
                'terms'    => $pagename,
            ),
        ),                                                 
        ));
        if( $your_custom_query->have_posts() ) :
            
            while ($your_custom_query->have_posts()): $your_custom_query->the_post();

                if ($pagename == "assemblee-generale") 
                {
                    if( get_field('member_activity') == "Salarié")  
                    $sal .=  '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';

                    if( get_field('member_activity') == "Libéral") 
                    $lib .= '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';
                }
                if ($pagename == "conseil-dadministration") 
                {
                    $txt .= '<span>'.get_field('member_firstname').' '.get_field('member_lastname').'</span>';
                }
            endwhile; wp_reset_postdata(); 
        endif;
        if($pagename == "assemblee-generale"){
            echo '<td>'.$sal.'</td>';
            echo '<td>'.$lib.'</td>';
        }
        if($pagename == "conseil-dadministration"){
            echo '<td>'.$txt.'</td>';
        }
        echo    '</tr>';  
    endwhile;

    echo '</table>';
endif;
wp_reset_postdata();

?>