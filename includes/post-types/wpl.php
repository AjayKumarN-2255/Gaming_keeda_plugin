<?php

function igk_wpl_post_type()
{

    $labels = [
        'name' => 'WPL',
        'singular_name' => 'WPL',
        'menu_name' => 'WPL',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New WPL Post',
        'edit_item' => 'Edit WPL Post',
        'new_item' => 'New WPL Post',
        'view_item' => 'View WPL Post',
        'all_items' => 'All WPL Posts',
        'search_items' => 'Search WPL',
        'not_found' => 'No WPL posts found',
        'not_found_in_trash' => 'No WPL posts found in Trash',
    ];

    register_post_type('igk_wpl', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'wpl'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'WPL',
        'graphql_plural_name' => 'WPLs',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 7,
        'menu_icon' => 'dashicons-awards',
    ]);
}

add_action('init', 'igk_wpl_post_type');
