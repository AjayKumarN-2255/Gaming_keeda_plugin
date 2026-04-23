<?php

function igk_predictions_post_type()
{

    $labels = [
        'name' => 'Predictions',
        'singular_name' => 'Prediction',
        'menu_name' => 'Predictions',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Prediction',
        'edit_item' => 'Edit Prediction',
        'new_item' => 'New Prediction',
        'view_item' => 'View Prediction',
        'all_items' => 'All Predictions',
        'search_items' => 'Search Predictions',
        'not_found' => 'No Predictions found',
        'not_found_in_trash' => 'No Predictions found in Trash',
    ];

    register_post_type('igk_predictions', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'predictions'],
        'show_in_rest' => true,
        'show_in_graphql' => true,
        'graphql_single_name' => 'Prediction',
        'graphql_plural_name' => 'Predictions',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 11,
        'menu_icon' => 'dashicons-chart-line',
    ]);
}

add_action('init', 'igk_predictions_post_type');
