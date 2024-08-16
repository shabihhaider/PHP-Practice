<?php

function dd($value) { // dd stands for "dump and die"
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($path) {
    return $_SERVER['REQUEST_URI'] === $path;
}