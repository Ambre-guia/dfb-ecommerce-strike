<?php

function dfb_register_project_cpt()
{
    $labels1 = array(
        'name' => _x('Projets', 'post type general name', 'dfb-ecommerce-strike'),
        'singular_name' => _x('Projet', 'post type singular name', 'dfb-ecommerce-strike'),
        'menu_name' => _x('Projets', 'admin menu', 'dfb-ecommerce-strike'),
        'name_admin_bar' => _x('Projet', 'add new on admin bar', 'dfb-ecommerce-strike'),
        'add_new' => _x('Ajouter', 'projet', 'dfb-ecommerce-strike'),
        'add_new_item' => __('Ajouter un nouveau projet', 'dfb-ecommerce-strike'),
        'new_item' => __('Nouveau projet', 'dfb-ecommerce-strike'),
        'edit_item' => __('Modifier le projet', 'dfb-ecommerce-strike'),
        'view_item' => __('Voir le projet', 'dfb-ecommerce-strike'),
        'all_items' => __('Tous les projets', 'dfb-ecommerce-strike'),
        'search_items' => __('Rechercher des projets', 'dfb-ecommerce-strike'),
        'parent_item_colon' => __('Projets parents:', 'dfb-ecommerce-strike'),
        'not_found' => __('Aucun projet trouvé.', 'dfb-ecommerce-strike'),
        'not_found_in_trash' => __('Aucun projet trouvé dans la corbeille.', 'dfb-ecommerce-strike')
    );
    $labels2 = array(
        'name' => _x('Tarif', 'post type general name', 'dfb-ecommerce-strike'),
        'singular_name' => _x('Tarif', 'post type singular name', 'dfb-ecommerce-strike'),
        'menu_name' => _x('Tarifs', 'admin menu', 'dfb-ecommerce-strike'),
        'name_admin_bar' => _x('Tarif', 'add new on admin bar', 'dfb-ecommerce-strike'),
        'add_new' => _x('Ajouter', 'tarif', 'dfb-ecommerce-strike'),
        'add_new_item' => __('Ajouter un nouveau tarif', 'dfb-ecommerce-strike'),
        'new_item' => __('Nouveau tarif', 'dfb-ecommerce-strike'),
        'edit_item' => __('Modifier le tarif', 'dfb-ecommerce-strike'),
        'view_item' => __('Voir le tarif', 'dfb-ecommerce-strike'),
        'all_items' => __('Tous les tarifs', 'dfb-ecommerce-strike'),
        'search_items' => __('Rechercher des tarifs', 'dfb-ecommerce-strike'),
        'parent_item_colon' => __('Tarifs parents:', 'dfb-ecommerce-strike'),
        'not_found' => __('Aucun tarif trouvé.', 'dfb-ecommerce-strike'),
        'not_found_in_trash' => __('Aucun tarif trouvé dans la corbeille.', 'dfb-ecommerce-strike')
    );

    $args1 = array(
        'labels' => $labels1,
        'description' => __('Description.', 'dfb-ecommerce-strike'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projet'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );
    $args2 = array(
        'labels' => $labels2,
        'description' => __('Catalogue des tarifs.', 'dfb-ecommerce-strike'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tarifs'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );

    register_post_type('projet', $args1);
    register_post_type('tarif', $args2);
    // Enregistrement de la taxonomie pour les catégories de projets
    $taxonomy_labels1 = array(
        'name' => _x('Catégories de projets', 'taxonomy general name', 'dfb-ecommerce-strike'),
        'singular_name' => _x('Catégorie de projet', 'taxonomy singular name', 'dfb-ecommerce-strike'),
        'search_items' => __('Rechercher des catégories', 'dfb-ecommerce-strike'),
        'all_items' => __('Toutes les catégories', 'dfb-ecommerce-strike'),
        'parent_item' => __('Catégorie parente', 'dfb-ecommerce-strike'),
        'parent_item_colon' => __('Catégorie parente:', 'dfb-ecommerce-strike'),
        'edit_item' => __('Modifier la catégorie', 'dfb-ecommerce-strike'),
        'update_item' => __('Mettre à jour la catégorie', 'dfb-ecommerce-strike'),
        'add_new_item' => __('Ajouter une nouvelle catégorie', 'dfb-ecommerce-strike'),
        'new_item_name' => __('Nom de la nouvelle catégorie', 'dfb-ecommerce-strike'),
        'menu_name' => __('Catégories', 'dfb-ecommerce-strike'),
    );
    $taxonomy_labels2 = array(
        'name' => _x('Catégories de tarifs', 'taxonomy general name', 'dfb-ecommerce-strike'),
        'singular_name' => _x('Catégorie de tarif', 'taxonomy singular name', 'dfb-ecommerce-strike'),
        'search_items' => __('Rechercher des catégories', 'dfb-ecommerce-strike'),
        'all_items' => __('Toutes les catégories', 'dfb-ecommerce-strike'),
        'parent_item' => __('Catégorie parente', 'dfb-ecommerce-strike'),
        'parent_item_colon' => __('Catégorie parente:', 'dfb-ecommerce-strike'),
        'edit_item' => __('Modifier la catégorie', 'dfb-ecommerce-strike'),
        'update_item' => __('Mettre à jour la catégorie', 'dfb-ecommerce-strike'),
        'add_new_item' => __('Ajouter une nouvelle catégorie', 'dfb-ecommerce-strike'),
        'new_item_name' => __('Nom de la nouvelle catégorie', 'dfb-ecommerce-strike'),
        'menu_name' => __('Catégories', 'dfb-ecommerce-strike'),
    );

    $taxonomy_args1 = array(
        'hierarchical' => true,
        'labels' => $taxonomy_labels1,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-projet'),
        'show_in_rest' => true,
    );
    $taxonomy_args2 = array(
        'hierarchical' => true,
        'labels' => $taxonomy_labels2,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-tarif'),
        'show_in_rest' => true,
    );
    register_taxonomy('categorie-projet', array('projet'), $taxonomy_args1);
    register_taxonomy('categorie-tarif', array('tarif'), $taxonomy_args2);
}


add_action('init', 'dfb_register_project_cpt');
