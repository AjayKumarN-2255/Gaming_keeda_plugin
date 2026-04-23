<?php

function igk_news_post_type()
{

    $labels = [
        'name' => 'News',
        'singular_name' => 'News',
        'menu_name' => 'News',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New News',
        'edit_item' => 'Edit News',
        'new_item' => 'New News',
        'view_item' => 'View News',
        'all_items' => 'All News',
        'search_items' => 'Search News',
        'not_found' => 'No News found',
        'not_found_in_trash' => 'No News found in Trash',
    ];

    register_post_type('igk_news', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'news'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'News',
        'graphql_plural_name' => 'NewsItems',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 8,
        'menu_icon' => 'dashicons-media-document',
    ]);
}

add_action('init', 'igk_news_post_type');
