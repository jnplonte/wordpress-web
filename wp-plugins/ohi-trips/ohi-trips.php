<?php
/**
* Plugin Name: OHI Trips
* Description: OHI trips plugin
* Version: 1.0
* Author: John Paul Onte
* Author URI: http://www.jnpl.me/
**/
 
function register_trip() {
 
    $labels = array(
        'name' => _x( 'Trips', 'trips' ),
        'singular_name' => _x( 'trip', 'trips' ),
        'add_new' => _x( 'Add New', 'trips' ),
        'add_new_item' => _x( 'Add New Trip', 'trips' ),
        'edit_item' => _x( 'Edit Trip', 'trips' ),
        'new_item' => _x( 'New Trip', 'trips' ),
        'view_item' => _x( 'View Trip', 'trips' ),
        'search_items' => _x( 'Search Trip', 'trips' ),
        'not_found' => _x( 'No trip found', 'trips' ),
        'not_found_in_trash' => _x( 'No trip found in Trash', 'trips' ),
        'parent_item_colon' => _x( 'Parent Trip:', 'trips' ),
        'menu_name' => _x( 'Trips', 'trips' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Trip filterable by category',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'trip_categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-palmtree',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'trips', $args );
}
add_action( 'init', 'register_trip' );


function category_trip_taxonomy() {
    register_taxonomy(
        'trip_categories',
        'trips',
        array(
            'hierarchical' => true,
            'label' => 'Categories',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'trip-category',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'category_trip_taxonomy');


function create_trip_page() {
    $post = array(
          'comment_status' => 'open',
          'ping_status' =>  'closed' ,
          'post_date' => date('Y-m-d H:i:s'),
          'post_name' => 'trips',
          'post_status' => 'publish' ,
          'post_title' => 'Trips',
          'post_type' => 'page'
    );

    $newvalue = wp_insert_post( $post, false );

    update_option( 'mrpage', $newvalue );
}
register_activation_hook( __FILE__, 'create_trip_page');
