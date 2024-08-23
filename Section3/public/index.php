<?php

const BASE_PATH = __DIR__ . "/../";  // __DIR__ is a magic constant that returns the directory of the current file and /../ is used to go up one directory

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) { // autoload function is used to load classes automatically
    // var_dump(base_path($class . ".php")); // You can use this to debug the path

    $class = str_replace("\\", "/", $class);
    
    require base_path("{$class}.php");
});

$router = new \Core\Router();

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Returns the path of the URI (e.g. "/about") Current URI

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD']; // If the request method is POST, then check if the _method is set in the POST request. If it is set, then use that method. Otherwise, use the request method

$router->route($uri, $method);