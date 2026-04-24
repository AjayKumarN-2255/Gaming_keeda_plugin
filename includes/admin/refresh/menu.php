<?php

function igk_refresh_init()
{
    add_action('admin_menu', function () {
        add_menu_page(
            'Rebuild Frontend',        // Page title
            'Rebuild Frontend',        // Menu title
            'manage_options',          // Capability
            'rebuild-frontend',        // Menu slug
            'igk_rebuild_frontend',    // Callback function
            'dashicons-admin-site',    // Icon (optional)
            5                  // Position: lower number = higher/top in menu
        );
    });
}

add_action('init', 'igk_refresh_init');
