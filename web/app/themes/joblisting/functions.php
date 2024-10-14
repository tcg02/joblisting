<?php

function joblist_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    // Enqueue the compiled CSS from dist
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/css/main.css', [], $theme_version);

    // Enqueue the compiled JS from dist
    wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/app.js', [], $theme_version, $in_footer=true);
}
add_action('wp_enqueue_scripts', 'joblist_enqueue_assets');
