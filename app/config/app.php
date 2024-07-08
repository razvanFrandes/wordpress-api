<?php
use Illuminate\Container\Container;
use WP\Services\AuthenticationService;
use WP\Services\DataService;

$container = Container::getInstance();

$container->bind(AuthenticationService::class, function ($container) {
    return new AuthenticationService();
});

$container->bind(DataService::class, function ($container) {
    return new DataService();
});

return $container;