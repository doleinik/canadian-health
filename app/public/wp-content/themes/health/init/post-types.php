<?php

add_action('init', 'register_stories_post_type');
function register_stories_post_type()
{
    register_post_type('stories', [
        'label' => 'Stories',
        'labels' => array(
            'name' => 'Stories',
            'singular_name' => 'Stories',
            'menu_name' => 'Stories',
            'all_items' => 'All Stories',
            'add_new' => 'Add stories',
            'add_new_item' => 'Add stories',
            'edit' => 'Edit stories',
            'edit_item' => 'Edit stories',
            'new_item' => 'New stories',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'stories'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessperson',
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('stories-tag', 'stories-type', 'stories-category'),
        'register_meta_box_cb' => false
    ]);

    register_taxonomy('stories-category', ['stories'], [
        'label' => 'Category',
        'labels' => [
            'name' => 'Category',
            'singular_name' => 'Category',
            'search_items' => 'Search Category',
            'all_items' => 'All Category',
            'view_item ' => 'View Category',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'menu_name' => 'Category',
            'back_to_items' => '← Back to Category',
        ],
        'description' => '',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => 'post_categories_meta_box',
        'show_admin_column' => true,
        'show_in_rest' => null,
        'rest_base' => null
    ]);

    register_taxonomy('stories-tag', ['stories'], [
        'label' => 'Tags',
        'labels' => [
            'name' => 'Tags',
            'singular_name' => 'Tag',
            'search_items' => 'Search Tag',
            'all_items' => 'All Tags',
            'view_item ' => 'View Tags',
            'parent_item' => 'Parent Tags',
            'parent_item_colon' => 'Parent Tags:',
            'edit_item' => 'Edit Tag',
            'update_item' => 'Update Tag',
            'add_new_item' => 'Add New Tag',
            'new_item_name' => 'New Tag Name',
            'menu_name' => 'Tags',
            'back_to_items' => '← Back to Tags',
        ],
        'description' => '',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => 'post_categories_meta_box',
        'show_admin_column' => true,
        'show_in_rest' => null,
        'rest_base' => null
    ]);

    register_taxonomy('stories-type', ['stories'], [
        'label' => 'Type',
        'labels' => [
            'name' => 'Type',
            'singular_name' => 'Type',
            'search_items' => 'Search Type',
            'all_items' => 'All Type',
            'view_item ' => 'View Type',
            'parent_item' => 'Parent Type',
            'parent_item_colon' => 'Parent Type:',
            'edit_item' => 'Edit Type',
            'update_item' => 'Update Type',
            'add_new_item' => 'Add New Type',
            'new_item_name' => 'New Type Name',
            'menu_name' => 'Type',
            'back_to_items' => '← Back to Type',
        ],
        'description' => '',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => 'post_categories_meta_box',
        'show_admin_column' => true,
        'show_in_rest' => null,
        'rest_base' => null
    ]);
}

add_action('init', 'register_shorts_post_type');
function register_shorts_post_type()
{
    register_post_type('shorts', [
        'label' => 'Shorts',
        'labels' => array(
            'name' => 'Shorts',
            'singular_name' => 'Shorts',
            'menu_name' => 'Shorts',
            'all_items' => 'All Shorts',
            'add_new' => 'Add Shorts',
            'add_new_item' => 'Add Shorts',
            'edit' => 'Edit Shorts',
            'edit_item' => 'Edit Shorts',
            'new_item' => 'New Shorts',
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'rewrite' => array('slug' => 'shorts'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessperson',
        'show_in_rest' => true,
        'taxonomies' => array('tag'),
    ]);

    register_taxonomy('tag', ['shorts'], [
        'label' => 'Tags',
        'labels' => [
            'name' => 'Tags',
            'singular_name' => 'Tag',
            'search_items' => 'Search Tag',
            'all_items' => 'All Tags',
            'view_item ' => 'View Tags',
            'parent_item' => 'Parent Tags',
            'parent_item_colon' => 'Parent Tags:',
            'edit_item' => 'Edit Tag',
            'update_item' => 'Update Tag',
            'add_new_item' => 'Add New Tag',
            'new_item_name' => 'New Tag Name',
            'menu_name' => 'Tags',
            'back_to_items' => '← Back to Tags',
        ],
        'description' => '',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => 'post_categories_meta_box',
        'show_admin_column' => true,
        'show_in_rest' => null,
        'rest_base' => null
    ]);
}
