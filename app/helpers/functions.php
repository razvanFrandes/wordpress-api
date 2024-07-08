<?php

function deg($code) {
  echo '<pre>';
  print_r($code);
  echo '</pre>';
};

function degx($code) {
  deg($code);
  wp_die();
};

function logx($code, $prefix = false) {
  if ($prefix) {
    error_log('_________________________: ' . $code);
  }
  $message = print_r($code, true);
  error_log($message);
}
