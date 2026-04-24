<?php

add_action('graphql_register_types', function () {

    register_graphql_object_type('PlayerBasic', [
        'fields' => [
            'player_name' => ['type' => 'String'],
            'title' => ['type' => 'String'],
            'country' => ['type' => 'String'],
            'player_type' => ['type' => 'String'],
            'profile_image_url' => ['type' => 'String'],
        ]
    ]);

    register_graphql_object_type('PlayerProfile', [
        'fields' => [
            'date_of_birth' => ['type' => 'String'],
            'age' => ['type' => 'Int'],
            'height_cm' => ['type' => 'Int'],
            'batting_style' => ['type' => 'String'],
            'bowling_style' => ['type' => 'String'],
            'jersey_number' => ['type' => 'String'],
            'role' => ['type' => 'String'],
            'debut_date' => ['type' => 'String'],
            'retirement_date' => ['type' => 'String'],
            'father_name' => ['type' => 'String'],
            'mother_name' => ['type' => 'String'],
            'teams' => ['type' => 'String'],
            'social_media' => ['type' => 'String'],
            'images' => ['type' => 'String'],
        ]
    ]);

    register_graphql_object_type('BattingStat', [
        'fields' => [
            'format' => ['type' => 'String'],
            'matches' => ['type' => 'Int'],
            'innings' => ['type' => 'Int'],
            'not_outs' => ['type' => 'Int'],
            'runs' => ['type' => 'Int'],
            'highest_score' => ['type' => 'Int'],
            'average' => ['type' => 'Float'],
            'balls_faced' => ['type' => 'Int'],
            'strike_rate' => ['type' => 'Float'],
        ]
    ]);

    register_graphql_object_type('BowlingStat', [
        'fields' => [
            'format' => ['type' => 'String'],
            'matches' => ['type' => 'Int'],
            'innings' => ['type' => 'Int'],
            'balls' => ['type' => 'Int'],
            'runs' => ['type' => 'Int'],
            'wickets' => ['type' => 'Int'],
            'best_bowling_innings' => ['type' => 'String'],
            'best_bowling_match' => ['type' => 'String'],
            'average' => ['type' => 'Float'],
            'economy_rate' => ['type' => 'Float'],
            'strike_rate' => ['type' => 'Float'],
        ]
    ]);

    register_graphql_object_type('Contract', [
        'fields' => [
            'year' => ['type' => 'Int'],
            'team' => ['type' => 'String'],
            'salary' => ['type' => 'Float'],
        ]
    ]);

    // IMPORTANT: Keep Player fields defined (structure only)
    register_graphql_object_type('Player', [
        'fields' => [
            'id' => ['type' => 'ID'],
        ]
    ]);
});
