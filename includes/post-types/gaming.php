<?php

function igk_gaming_post_type()
{

    $labels = [
        'name' => 'Gaming',
        'singular_name' => 'Game',
        'menu_name' => 'Gaming',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Game',
        'edit_item' => 'Edit Game',
        'new_item' => 'New Game',
        'view_item' => 'View Game',
        'all_items' => 'All Games',
        'search_items' => 'Search Games',
        'not_found' => 'No Games found',
        'not_found_in_trash' => 'No Games found in Trash',
    ];

    register_post_type('igk_gaming', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'gaming'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'Game',
        'graphql_plural_name' => 'Games',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-games',
        'menu_position' => 10,
    ]);
}

add_action('init', 'igk_gaming_post_type');
