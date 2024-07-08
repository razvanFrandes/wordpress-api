<?php

namespace WP\Api;

class ApiController {
  public function __construct() {
    add_action('rest_api_init', [$this, 'register_routes']);
  }

  public function register_routes() {
    (new PostsController())->register_routes();
  }
}
