<?php

namespace WP\Api;

use WP\Models\Post;

class PostsController {
  public function register_routes() {
    register_rest_route('app/v1', '/posts', [
      'methods' => 'GET',
      'callback' => [$this, 'get_posts'],
      'permission_callback' => [$this, 'check_permissions'],
    ]);
  }

  public function get_posts($request) {
    $posts = Post::get_all();
    return rest_ensure_response($posts);
  }

  public function check_permissions($request) {
    // Verifică permisiunile aici
    return true;
  }
}
