<?php

namespace WP;

$container = require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/wordpress/_wordpress.php';

$container->make(\WP\Api\ApiController::class);
