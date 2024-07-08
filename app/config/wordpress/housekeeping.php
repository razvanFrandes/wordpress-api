<?php

/**
 * Remove default post type
 */
add_action('admin_menu', 'mf_remove_menu_pages');
function mf_remove_menu_pages() {
    remove_menu_page('edit.php');
    remove_menu_page('themes.php');
}

/**
 * Remove wp-embeded.js from footer
 */
remove_action('wp_head', 'wp_oembed_add_host_js');

/**
 * Remove default widgets
 */
function remove_default_widgets() {
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Meta');
    // Add more widgets as needed
}
add_action('widgets_init', 'remove_default_widgets');

/**
 * Remove dashboard widgets
 */
function remove_dashboard_widgets() {
    // Remove widgets as needed
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/**
 * Dequeue the Block Library CSS.
 */
function remove_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_block_library_css', 100);

/**
 * Remove some woocomerce inline style
 */
add_action('init', 'remove_wc_noscript');
function remove_wc_noscript() {
    remove_action('wp_head', 'wc_gallery_noscript');
};

/**
 * Add correct title tag support
 */
add_theme_support('title-tag');

/**
 * Remove gutenburg 
 */
add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Remove generator meta tags.
 */
add_filter('the_generator', '__return_false');

/**
 * Disable XML RPC.
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Change REST-API header from "null" to "*".
 */
function _s_cors_control() {
    header('Access-Control-Allow-Origin: *');
}
add_action('rest_api_init', '_s_cors_control');

/**
 * Change REST-API URL prefix.
 */
add_filter('rest_url_prefix', function () {
    return 'api';
});

/*
* Disable ACF update notifications
*/
function disable_acf_update_notifications($value) {
    unset($value->response['advanced-custom-fields-pro/acf.php']);
    return $value;
}
add_filter('site_transient_update_plugins', 'disable_acf_update_notifications');
