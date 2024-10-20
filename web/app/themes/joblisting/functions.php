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
foreach (glob(get_template_directory() . '/app/helpers/*.php') as $file) { require_once($file); }

/**
 * Pass a properly escaped array as a vue prop
 */
function json_vue_prop($value) {
    $value = json_encode($value);
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', true);
}

function handle_create_job_post_submission() {   
   
    if (!isset($_POST['create_job_post_nonce']) || 
        !wp_verify_nonce($_POST['create_job_post_nonce'], 'create_job_post_action')) {
        wp_die('Nonce verification failed.');
    } 
    $controller = new Controllers\JobPostController();
    $result = $controller->create();

    if (isset($result['error'])) {        
        wp_redirect(home_url('/error-page'));
        exit;
    } else {
        wp_redirect(home_url('/'));
        exit;
    }
}


add_action('admin_post_nopriv_create_job_post', 'handle_create_job_post_submission');
add_action('admin_post_create_job_post', 'handle_create_job_post_submission');


add_action('save_post', function($post_id, $post, $update) {  
    if ($post->post_type === 'post') {
        \Helpers\CachingHelper::deleteAllJobPostCache();
    }
}, 10, 3);
 

