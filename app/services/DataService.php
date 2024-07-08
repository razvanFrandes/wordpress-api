<?php

namespace WP\Services;

use WP\Models\Post;

class DataService {
  public function get_recent_posts($limit = 5) {
    return Post::get_all(['posts_per_page' => $limit]);
  }

  public function search_content($query) {
    return Post::get_all(['s' => $query]);
  }
}
