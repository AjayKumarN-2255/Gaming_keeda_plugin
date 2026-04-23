<?php

function igk_cricket_post_type()
{

    $labels = [
        'name' => 'Cricket',
        'singular_name' => 'Cricket',
        'menu_name' => 'Cricket',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Cricket',
        'edit_item' => 'Edit Cricket',
        'new_item' => 'New Cricket',
        'view_item' => 'View Cricket',
        'all_items' => 'All Cricket',
        'search_items' => 'Search Cricket',
        'not_found' => 'No Cricket found',
        'not_found_in_trash' => 'No Cricket found in Trash',
    ];

    register_post_type('igk_cricket', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'cricket'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'Cricket',
        'graphql_plural_name' => 'Crickets',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-awards',
        'menu_position' => 5,
    ]);
}

add_action('init', 'igk_cricket_post_type');
