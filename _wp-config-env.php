<?php
require_once(ABSPATH  . '/vendor/autoload.php');

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(ABSPATH);
$dotenv->load();



define('API_VERSION', 'v1');
define('MAX_ITEMS_PER_PAGE', 20);


define('WP_USE_THEMES', false);
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', ABSPATH . '/_debug.log');
define('DISALLOW_FILE_EDIT', true);
define('WP_APP_PATH', ABSPATH . '/app');
define('HM_MU_PLUGINS', [
  'mailgun/mailgun.php',
  'query-monitor/query-monitor.php',
  'simple-jwt-login/simple-jwt-login.php',
]);
