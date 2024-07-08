<?php
/*
Plugin Name:App Init
Version: 1.0
Author: Razvan Frandes
Author URI: razvan.frandes@gmail.com
*/

if (!defined('ABSPATH')) {
  exit;
}

function wp_app_init() {
  require_once WP_APP_PATH . '/bootstrap.php';
}

add_action('plugins_loaded', 'wp_app_init', 20);
