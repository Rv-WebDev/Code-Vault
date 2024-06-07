<?php
function custom_post_type_job() {

    $labels = array(
        'name'               => _x( 'Jobs', 'Post Type General Name', 'genesis' ),
        'singular_name'      => _x( 'Job', 'Post Type Singular Name', 'genesis' ),
        'menu_name'          => __( 'Jobs', 'genesis' ),
        'parent_item_colon'  => __( 'Parent Job', 'genesis' ),
        'all_items'          => __( 'All Jobs', 'genesis' ),
        'view_item'          => __( 'View Job', 'genesis' ),
        'add_new_item'       => __( 'Add New Job', 'genesis' ),
        'add_new'            => __( 'Add New', 'genesis' ),
        'edit_item'          => __( 'Edit Job', 'genesis' ),
        'update_item'        => __( 'Update Job', 'genesis' ),
        'search_items'       => __( 'Search Job', 'genesis' ),
        'not_found'          => __( 'Not Found', 'genesis' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'genesis' ),
    );

    $args = array(
        'label'               => __( 'job', 'genesis' ),
        'description'         => __( 'Jobs listings', 'genesis' ),
        'labels'              => $labels,  
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'post-formats' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'menu_position'       => 8, // Adjust menu position as needed
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-businessman', // Change icon as needed
    );

    // Registering Custom Post Type
    register_post_type( 'job', $args );
}

add_action( 'init', 'custom_post_type_job', 0 );