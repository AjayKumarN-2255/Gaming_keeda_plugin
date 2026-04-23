<?php

add_action('rest_api_init', function () {

    register_rest_route('igk/v1', '/player', [
        'methods'  => 'POST',
        'callback' => 'igk_save_player_data',
        'permission_callback' => '__return_true',
    ]);
});
