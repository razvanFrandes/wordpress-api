<?php

namespace WP\Services;

class AuthenticationService {
  public function authenticate($username, $password) {
    $user = wp_authenticate($username, $password);
    if (is_wp_error($user)) {
      return false;
    }
    return $user;
  }

  public function generate_token($user_id) {
  }
}
