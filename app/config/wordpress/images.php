<?php

function my_custom_image_sizes() {
  /* 
  * Add custom image sizes
  * add_image_size( $name, $width, $height, $crop );
  * $crop: true, false, array
  */
}
add_action('after_setup_theme', 'my_custom_image_sizes');


function my_remove_default_image_sizes($sizes) {
  // unset($sizes['thumbnail']);    // Remove thumbnail size
  // unset($sizes['medium']);       // Remove medium size
  // unset($sizes['large']);        // Remove large size
  // unset($sizes['medium_large']); // Remove medium-large size  
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'my_remove_default_image_sizes');
