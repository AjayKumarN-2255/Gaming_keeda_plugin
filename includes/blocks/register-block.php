<?php

function up_register_blocks()
{
    $blocks = [
        ['name' => 'author-bio'],
        ['name' => 'faq'],
        ['name' => 'link-list'],
        // [
        //     'name' => 'search-form',
        //     'options' => ['render_callback' => 'up_search_form_render_cb']
        // ]
    ];

    foreach ($blocks as $block) {

        $args = [];
        if (isset($block['options'])) {
            $args = $block['options'];
        }

        register_block_type(
            IGK_PATH . 'build/blocks/' . $block['name'],
            $args
        );
    }
}
// add_action('init', 'up_register_blocks');
