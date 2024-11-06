<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'home',
    '/about' => 'about',
    '/contact' => 'contact',
    '/404' => '404'
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort()
{
    http_response_code(404);
    require '404.php';
    die();
}

routeToController($uri, $routes);