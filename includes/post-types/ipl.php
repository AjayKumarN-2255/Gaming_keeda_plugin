<?php

function igk_ipl_post_type()
{
    $labels = [
        'name' => 'IPL',
        'singular_name' => 'IPL',
        'menu_name' => 'IPL',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New IPL Post',
        'edit_item' => 'Edit IPL Post',
        'new_item' => 'New IPL Post',
        'view_item' => 'View IPL Post',
        'all_items' => 'All IPL Posts',
        'search_items' => 'Search IPL',
        'not_found' => 'No IPL posts found',
        'not_found_in_trash' => 'No IPL posts found in Trash',
    ];

    register_post_type('igk_ipl', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'ipl'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'IPL',
        'graphql_plural_name' => 'IPLs',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 6,
        'menu_icon' => 'dashicons-awards',
    ]);
}

add_action('init', 'igk_ipl_post_type');
