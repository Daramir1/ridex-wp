<?php

function ridex_assets()
{
    wp_enqueue_style(
        'ridex-style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css')
    );
    wp_enqueue_script(
        'ridex-script',
        get_template_directory_uri() . '/js/script.js',
        [],
        filemtime(get_template_directory() . '/js/script.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'ridex_assets');
function ridex_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
}

add_action('after_setup_theme', 'ridex_setup');
