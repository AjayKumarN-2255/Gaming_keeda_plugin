<?php

add_action('graphql_register_types', function () {

    register_graphql_field('RootQuery', 'players', [
        'type' => ['list_of' => 'Player'],
        'args' => [
            'limit' => ['type' => 'Int'],
            'offset' => ['type' => 'Int']
        ],
        'resolve' => function ($root, $args) {

            global $wpdb;

            $table = $wpdb->prefix . 'igk_players';

            $limit = $args['limit'] ?? 10;
            $offset = $args['offset'] ?? 0;

            // ✅ prepare used correctly
            $query = $wpdb->prepare(
                "SELECT id FROM {$table} LIMIT %d OFFSET %d",
                $limit,
                $offset
            );

            $rows = $wpdb->get_results($query, ARRAY_A);

            // ✅ convert to GraphQL format
            return array_map(function ($row) {
                return ['id' => (int) $row['id']];
            }, $rows);
        }
    ]);
});
