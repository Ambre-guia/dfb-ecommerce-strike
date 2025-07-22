<section class="hero-frontpage nopadding">
    <div id="slider">
        <div class="slider-inner">
            <div id="slider-content" class="slider-content">
                <div class="meta">Services</div>
                <?php
                $tarifs = new WP_Query(array(
                    'post_type' => 'tarif',
                    'posts_per_page' => -1
                ));

                if ($tarifs->have_posts()) :
                    // Afficher le premier titre comme titre initial
                    $tarifs->the_post();
                    echo '<h2 id="slide-title">' . get_the_title() . '</h2>';
                    $tarifs->rewind_posts();

                    // Générer les spans pour tous les titres
                    $index = 0;
                    while ($tarifs->have_posts()) : $tarifs->the_post();
                        echo '<span data-slide-title="' . $index . '">' . get_the_title() . '</span>';
                        $index++;
                    endwhile;

                    echo '<div class="meta">Besoin</div>';

                    // Afficher la première description comme statut initial
                    $tarifs->rewind_posts();
                    $tarifs->the_post();
                    $categories = get_the_terms(get_the_ID(), 'categorie-tarif');
                    $cat_names = array();
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $cat_names[] = $category->name;
                        }
                    }
                    echo '<div id="slide-status" class="slider-status">' . implode(', ', $cat_names) . '</div>';

                    // Générer les spans pour toutes les descriptions
                    $index = 0;
                    $tarifs->rewind_posts();
                    while ($tarifs->have_posts()) : $tarifs->the_post();
                        $categories = get_the_terms(get_the_ID(), 'categorie-tarif');
                        $cat_names = array();
                        if ($categories && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                $cat_names[] = $category->name;
                            }
                        }
                        echo '<span data-slide-status="' . $index . '">' . implode(', ', $cat_names) . '</span>';
                        $index++;
                    endwhile;

                    // Générer les liens pour chaque slide
                    $index = 0;
                    $tarifs->rewind_posts();
                    while ($tarifs->have_posts()) : $tarifs->the_post();
                        $active_class = $index === 0 ? ' active' : '';
                        echo '<a href="' . get_the_permalink() . '" data-slide-link="' . $index . '" class="btn readmorelink alignleft white' . $active_class . '" style="display: ' . ($index === 0 ? 'block' : 'none') . '">En savoir plus sur ' . get_the_title() . '</a>';
                        $index++;
                    endwhile;

                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <?php
        // Afficher les images
        if ($tarifs->have_posts()) :
            $tarifs->rewind_posts();
            while ($tarifs->have_posts()) : $tarifs->the_post();
                if (has_post_thumbnail()) :
                    echo get_the_post_thumbnail();
                endif;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>

        <div id="pagination" class="slider-pagination">
            <?php
            // Générer la pagination
            if ($tarifs->have_posts()) :
                $index = 0;
                $tarifs->rewind_posts();
                while ($tarifs->have_posts()) : $tarifs->the_post();
                    $active_class = $index === 0 ? ' active' : '';
                    echo '<button class="btn-slider' . $active_class . '" data-slide="' . $index . '"></button>';
                    $index++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>