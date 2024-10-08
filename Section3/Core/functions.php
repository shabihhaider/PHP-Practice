<?php

use Core\Response;

function dd($value) { // dd stands for "dump and die"
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($path) {
    return $_SERVER['REQUEST_URI'] === $path;
}

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
        require base_path("views/{$code}.php");
        
        die(); // kill the execution
}

function authorization($condition, $status =  Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {

    extract($attributes); // Extract the array into variables (keys into variable names and values into variable values)

    require base_path(("views/{$path}"));
}