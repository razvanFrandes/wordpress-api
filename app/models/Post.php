<?php

namespace WP\Models;

class Post {
  public static function get_all() {
    $args = [
      'post_type' => 'post',
      'posts_per_page' => -1,
    ];
    $query = new \WP_Query($args);
    return $query->posts;
  }

  public static function get_by_id($id) {
    return get_post($id);
  }
}
