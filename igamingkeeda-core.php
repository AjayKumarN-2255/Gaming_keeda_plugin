<?php

/**
 * Plugin Name:       igamingkeeda-core
 * Description:       A plugin for adding custom post-types and blocks.
 * Version:           1.0.1
 * Author:            Ajay Kumar N
 * Text Domain:       igamingkeeda-core
 * License:           GPL-2.0+
 */

if (!function_exists('add_action')) {
    echo "you reached here by accident";
    exit;
}

define('IGK_PATH', plugin_dir_path(__FILE__));
define('IGK_URL', plugin_dir_url(__FILE__));

require_once IGK_PATH . 'includes/init.php';

add_action('admin_enqueue_scripts', 'igk_enqueue_admin_app');

function igk_enqueue_admin_app($hook)
{
    // Load on main Players page and all submenu pages
    if (
        $hook !== 'toplevel_page_igk-players' &&
        strpos($hook, 'igk-players') === false
    ) {
        return;
    }
    wp_enqueue_style(
        'igk-admin-style',
        plugin_dir_url(__FILE__) . 'build/admin/admin.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'igk-admin-app',
        plugin_dir_url(__FILE__) . 'build/admin/admin.js',
        ['wp-element'],
        '1.0.0',
        true
    );
}

register_activation_hook(__FILE__, 'igk_create_players_table');
