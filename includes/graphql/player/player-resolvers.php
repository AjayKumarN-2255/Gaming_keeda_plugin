<?php

add_action('graphql_register_types', function () {

    // Root query (already working)
    register_graphql_field('RootQuery', 'player', [
        'type' => 'Player',
        'args' => [
            'id' => ['type' => 'ID']
        ],
        'resolve' => function ($root, $args) {
            return ['id' => (int) $args['id']];
        }
    ]);

    register_graphql_field('Player', 'basic', [
        'type' => 'PlayerBasic',
        'resolve' => function ($root, $args, $context, $info) {

            global $wpdb;

            $player_id = (int) $root['id'];
            $table = $wpdb->prefix . 'igk_players';

            // Dynamically select only the requested fields
            $fields = array_keys($info->getFieldSelection(1));
            // convert array of fields to a comma-separated string for SQL
            $columns = implode(', ', $fields);

            $query = $wpdb->prepare(
                "SELECT {$columns} 
                 FROM {$table} 
                 WHERE id = %d",
                $player_id
            );
            $player = $wpdb->get_row($query, ARRAY_A);

            return $player ?: null;
        }
    ]);


    register_graphql_field('Player', 'profile', [
        'type' => 'PlayerProfile',
        'resolve' => function ($root, $args, $context, $info) {

            global $wpdb;

            $player_id = (int) $root['id'];
            $table = $wpdb->prefix . 'igk_player_profiles';

            // Dynamically select only the requested fields
            $fields = array_keys($info->getFieldSelection(1));
            // convert array of fields to a comma-separated string for SQL
            $columns = implode(', ', $fields);

            $query = $wpdb->prepare(
                "SELECT {$columns} 
                 FROM {$table} 
                 WHERE player_id = %d",
                $player_id
            );
            $player_profile = $wpdb->get_row($query, ARRAY_A);

            return $player_profile ?: null;
        }
    ]);

    register_graphql_field('Player', 'batting', [
        'type' => ['list_of' => 'BattingStat'],
        'resolve' => function ($root, $args, $context, $info) {

            global $wpdb;

            $player_id = (int) $root['id'];
            $table = $wpdb->prefix . 'igk_batting_stats';

            // Dynamically select only the requested fields
            $fields = array_keys($info->getFieldSelection(1));
            $columns = implode(', ', $fields);

            $query = $wpdb->prepare(
                "SELECT {$columns} 
                 FROM {$table} 
                 WHERE player_id = %d
                 ORDER BY format",
                $player_id
            );
            $batting_stats = $wpdb->get_results($query, ARRAY_A);

            return $batting_stats ?: [];
        }
    ]);

    register_graphql_field('Player', 'bowling', [
        'type' => ['list_of' => 'BowlingStat'],
        'resolve' => function ($root, $args, $context, $info) {

            global $wpdb;

            $player_id = (int) $root['id'];
            $table = $wpdb->prefix . 'igk_bowling_stats';

            // Dynamically select only the requested fields
            $fields = array_keys($info->getFieldSelection(1));
            $columns = implode(', ', $fields);

            $query = $wpdb->prepare(
                "SELECT {$columns} 
                 FROM {$table} 
                 WHERE player_id = %d
                 ORDER BY format",
                $player_id
            );
            $bowling_stats = $wpdb->get_results($query, ARRAY_A);

            return $bowling_stats ?: [];
        }
    ]);

    register_graphql_field('Player', 'contracts', [
        'type' => ['list_of' => 'Contract'],
        'resolve' => function ($root, $args, $context, $info) {

            global $wpdb;

            $player_id = (int) $root['id'];
            $table = $wpdb->prefix . 'igk_player_contracts';

            // Dynamically select only the requested fields
            $fields = array_keys($info->getFieldSelection(1));
            $columns = implode(', ', $fields);

            $query = $wpdb->prepare(
                "SELECT {$columns} 
                 FROM {$table} 
                 WHERE player_id = %d
                 ORDER BY year DESC",
                $player_id
            );
            $contracts = $wpdb->get_results($query, ARRAY_A);

            return $contracts ?: [];
        }
    ]);
});
