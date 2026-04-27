<?php

function up_register_blocks()
{
    $blocks_path = IGK_PATH . 'build/blocks/';

    foreach (glob($blocks_path . '*/block.json') as $block_json) {

        $block_dir = dirname($block_json);

        register_block_type($block_dir);
    }
    error_log('BLOCK PATH: ' . $blocks_path);
    error_log(print_r(glob($blocks_path . '*/block.json'), true));
}
add_action('init', 'up_register_blocks');
