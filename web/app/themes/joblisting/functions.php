<?php

function joblist_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    $localized = [
        'ajaxurl'   => admin_url( 'admin-ajax.php' ) . '?action=',
        'theID' => get_the_ID(),
        'siteurl' 	=> get_site_url(),
        'homeurl'   => get_home_url(),
        'templatedir' => get_template_directory_uri(),
        'resturl' => rest_url('joblisting/v1'),
        'restnonce' => wp_create_nonce('wp_rest'),
        'slug' => get_post_field('post_name')
    ];

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/css/main.css', [], $theme_version);
    wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/app.js', [], $theme_version, $in_footer=true);
    wp_localize_script( 'app', 'localized', $localized);
}
add_action('wp_enqueue_scripts', 'joblist_enqueue_assets');

// Include Classes
foreach (glob(get_template_directory() . '/app/*.php') as $file) { require_once($file); }
foreach (glob(get_template_directory() . '/app/models/*.php') as $file) { require_once($file); }
foreach (glob(get_template_directory() . '/app/rest-controllers/*.php') as $file) { require_once($file); }
foreach (glob(get_template_directory() . '/app/controllers/*.php') as $file) { require_once($file); }

/**
 * Pass a properly escaped array as a vue prop
 */
function json_vue_prop($value) {
    $value = json_encode($value);
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', true);
}