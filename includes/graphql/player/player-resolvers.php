<?php

add_action('graphql_register_types', function () {

    register_graphql_field('RootQuery', 'players', [
        'type' => ['list_of' => 'Player'],
        'description' => 'Get all cricket players',
        'resolve' => function () {
            return [
                [
                    'id' => 1,
                    'basic' => [
                        'player_name' => 'Virat Kohli',
                        'country' => 'India',
                        'player_type' => 'Batsman',
                        'profile_image_url' => 'https://example.com/virat.jpg',
                    ],
                ]
            ];
        }
    ]);
});
