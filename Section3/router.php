<?php

$routes = require "routes.php";

function routeToController($uri, $routes) {

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) { // By default, the code is 404: Page Not Found
    
    http_response_code($code);
    require "views/{$code}.php";
    
    die(); // kill the execution
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Returns the path of the URI (e.g. "/about")

routeToController($uri, $routes);