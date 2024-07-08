<?php

add_filter('upload_dir', 'custom_upload_directory');

function custom_upload_directory($dir) {
  // Get the current user ID and obfuscate it
  $user_id = get_current_user_id();
  $obfuscated_user_id =  md5($user_id);

  if (!empty($obfuscated_user_id)) {
    // Define the custom directory structure
    $custom_dir = '/media/' . $obfuscated_user_id;

    // Override the default upload paths
    $dir['subdir'] = '';
    $dir['path'] = ABSPATH . trim($custom_dir, '/');
    $dir['url'] = home_url() . $custom_dir;
    $dir['basedir'] = ABSPATH . 'media';
    $dir['baseurl'] = home_url() . '/media';
  }

  return $dir;
}
