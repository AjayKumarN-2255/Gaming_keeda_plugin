<?php

function igk_save_player_data($request)
{
    global $wpdb;

    try {

        // Get the JSON data from the request body
        $player_data = $request->get_json_params();

        // Extracting data from the request
        $basic = $player_data['basic'];
        $profile = $player_data['profile'];
        $batting = $player_data['batting'];
        $bowling = $player_data['bowling'];
        $contracts = $player_data['contracts'];

        // adding player basic info
        $table_players = $wpdb->prefix . 'igk_players';
        $inserted = $wpdb->insert($table_players, [
            'player_name'        => $basic['player_name'],
            'country'            => $basic['country'],
            'player_type'        => $basic['player_type'],
            'profile_image_url'  => $basic['profile_image_url']
        ]);
        if ($inserted === false) {
            return new WP_Error(
                'db_insert_error',
                $wpdb->last_error,
                ['status' => 500]
            );
        }

        // get the inserted player ID to link with profile and stats
        $player_id = $wpdb->insert_id;

        // adding player profile info
        $table_profiles = $wpdb->prefix . 'igk_player_profiles';
        $profile_inserted = $wpdb->insert($table_profiles, [
            'player_id'       => $player_id,
            'date_of_birth'   => $profile['date_of_birth'],
            'age'             => $profile['age'],
            'height_cm'       => $profile['height_cm'],
            'batting_style'   => $profile['batting_style'],
            'bowling_style'   => $profile['bowling_style'],
            'jersey_number'   => $profile['jersey_number'],
            'role'            => $profile['role'],
            'debut_date'      => $profile['debut_date'],
            'retirement_date' => $profile['retirement_date'],
            'father_name'     => $profile['father_name'],
            'mother_name'     => $profile['mother_name'],
            'teams'           => json_encode($profile['teams']),
            'social_media'    => json_encode($profile['social_media']),
            'images'          => json_encode($profile['images'])
        ]);
        if ($profile_inserted === false) {
            return new WP_Error('profile_insert_failed', $wpdb->last_error, ['status' => 500]);
        }

        //adding player batting stats
        $table_batting = $wpdb->prefix . 'igk_batting_stats';
        foreach ($batting as $b) {

            $wpdb->insert($table_batting, [
                'player_id'      => $player_id,
                'format'         => $b['format'],
                'matches'        => $b['matches'],
                'innings'        => $b['innings'],
                'not_outs'       => $b['not_outs'],
                'runs'           => $b['runs'],
                'highest_score'  => $b['highest_score'],
                'average'        => $b['average'],
                'balls_faced'    => $b['balls_faced'],
                'strike_rate'    => $b['strike_rate']
            ]);
        }

        //adding player bowling stats
        $table_bowling = $wpdb->prefix . 'igk_bowling_stats';
        foreach ($bowling as $b) {
            $wpdb->insert($table_bowling, [
                'player_id'              => $player_id,
                'format'                 => $b['format'] ?? '',
                'matches'                => $b['matches'] ?? 0,
                'innings'                => $b['innings'] ?? 0,
                'balls'                  => $b['balls'] ?? 0,
                'runs'                   => $b['runs'] ?? 0,
                'wickets'                => $b['wickets'] ?? 0,
                'best_bowling_innings'   => $b['best_bowling_innings'] ?? '',
                'best_bowling_match'     => $b['best_bowling_match'] ?? '',
                'average'                => $b['average'] ?? 0,
                'economy_rate'           => $b['economy_rate'] ?? 0,
                'strike_rate'            => $b['strike_rate'] ?? 0
            ]);
        }

        //adding player contracts
        $table_contracts = $wpdb->prefix . 'igk_player_contracts';
        foreach ($contracts as $c) {

            $wpdb->insert($table_contracts, [
                'player_id' => $player_id,
                'year'      => $c['year'] ?? 0,
                'team'      => $c['team'] ?? '',
                'salary'    => $c['salary'] ?? 0
            ]);
        }

        return [
            'success' => true,
            'message' => 'Player data saved successfully',
            'player_id' => $player_id
        ];
    } catch (Exception $e) {

        return new WP_Error(
            'server_error',
            $e->getMessage(),
            ['status' => 500]
        );
    }
}
