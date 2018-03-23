<?php
/**
* Plugin Name: OHI Projects
* Description: OHI projects plugin
* Version: 1.0
* Author: John Paul Onte
* Author URI: http://www.jnpl.me/
**/
 
function register_project() {
 
    $labels = array(
        'name' => _x( 'Projects', 'projects' ),
        'singular_name' => _x( 'project', 'projects' ),
        'add_new' => _x( 'Add New', 'projects' ),
        'add_new_item' => _x( 'Add New Project', 'projects' ),
        'edit_item' => _x( 'Edit Project', 'projects' ),
        'new_item' => _x( 'New Project', 'projects' ),
        'view_item' => _x( 'View Project', 'projects' ),
        'search_items' => _x( 'Search Project', 'projects' ),
        'not_found' => _x( 'No project found', 'projects' ),
        'not_found_in_trash' => _x( 'No project found in Trash', 'projects' ),
        'parent_item_colon' => _x( 'Parent Project:', 'projects' ),
        'menu_name' => _x( 'Projects', 'projects' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Project filterable by category',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'project_categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-aside',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'projects', $args );
}
add_action( 'init', 'register_project' );


function category_project_taxonomy() {
    register_taxonomy(
        'project_categories',
        'projects',
        array(
            'hierarchical' => true,
            'label' => 'Categories',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'project-category',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'category_project_taxonomy');


function create_project_page() {
    $post = array(
          'comment_status' => 'open',
          'ping_status' =>  'closed' ,
          'post_date' => date('Y-m-d H:i:s'),
          'post_name' => 'projects',
          'post_status' => 'publish' ,
          'post_title' => 'Projects',
          'post_type' => 'page'
    );

    $newvalue = wp_insert_post( $post, false );

    update_option( 'mrpage', $newvalue );
}
register_activation_hook( __FILE__, 'create_project_page');
