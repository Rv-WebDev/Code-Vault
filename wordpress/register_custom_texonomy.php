<?php
//Register Custom Texonomy 

register_taxonomy('job_category', ['job'], [
    'label' => __('Job Category', 'txtdomain'),
    'hierarchical' => true,
    'rewrite' => ['slug' => 'job-category'],
    'show_admin_column' => true,
    'show_in_rest' => true,
    'labels' => [
        'singular_name' => __('Job Category', 'txtdomain'),
        'all_items' => __('All Job Category', 'txtdomain'),
        'edit_item' => __('Edit Job Category', 'txtdomain'),
        'view_item' => __('View Job Category', 'txtdomain'),
        'update_item' => __('Update Job Category', 'txtdomain'),
        'add_new_item' => __('Add New Job Category', 'txtdomain'),
        'new_item_name' => __('New Job Category Name', 'txtdomain'),
        'search_items' => __('Search Job Category', 'txtdomain'),
        'parent_item' => __('Parent Job Category', 'txtdomain'),
        'parent_item_colon' => __('Parent Job Category:', 'txtdomain'),
        'not_found' => __('No Job Category found', 'txtdomain'),
    ]
]);
register_taxonomy_for_object_type('job_category', 'job_category');