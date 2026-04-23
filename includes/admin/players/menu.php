<?php

function igk_players_init()
{
    add_action('admin_menu', function () {

        add_menu_page(
            'Players',
            'Players',
            'manage_options',
            'igk-players',
            'igk_players_all_page',
            'dashicons-groups',
            9
        );

        add_submenu_page(
            'igk-players',
            'All Players',
            'All Players',
            'manage_options',
            'igk-players',
            'igk_players_all_page'
        );

        add_submenu_page(
            'igk-players',
            'Add Player',
            'Add Player',
            'manage_options',
            'igk-players-add',
            'igk_players_add_page'
        );

        add_submenu_page(
            '',
            'Edit Player',
            'Edit Player',
            'manage_options',
            'igk-players-edit',
            'igk_players_edit_page'
        );
    });
}

add_action('init', 'igk_players_init');
