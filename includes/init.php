<?php

defined('ABSPATH') || exit;

$folders = [
    'post-types',
    'database',
    // 'blocks',
    'admin/players',
    'admin/refresh',
    'api/player',
    'graphql/player',
];

foreach ($folders as $folder) {
    foreach (glob(__DIR__ . "/$folder/*.php") as $file) {
        require_once $file;
    }
}
