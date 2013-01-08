<?php

add_action( 'init', 'register_cpt_rns_campaign' );
/**
 * Create the Campaigns post type.
 */
function register_cpt_rns_campaign() {

    $labels = array( 
        'name' => _x( 'Campaigns', 'rns_campaign' ),
        'singular_name' => _x( 'Campaign', 'rns_campaign' ),
        'add_new' => _x( 'Add New', 'rns_campaign' ),
        'add_new_item' => _x( 'Add New Campaign', 'rns_campaign' ),
        'edit_item' => _x( 'Edit Campaign', 'rns_campaign' ),
        'new_item' => _x( 'New Campaign', 'rns_campaign' ),
        'view_item' => _x( 'View Campaign', 'rns_campaign' ),
        'search_items' => _x( 'Search Campaigns', 'rns_campaign' ),
        'not_found' => _x( 'No campaigns found', 'rns_campaign' ),
        'not_found_in_trash' => _x( 'No campaigns found in Trash', 'rns_campaign' ),
        'parent_item_colon' => _x( 'Parent Campaign:', 'rns_campaign' ),
        'menu_name' => _x( 'Campaigns', 'rns_campaign' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 100,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 
            'slug' => 'campaign', 
            'with_front' => true,
            'feeds' => true,
            'pages' => true
        ),
        'capability_type' => 'post'
    );

    register_post_type( 'rns_campaign', $args );
}
