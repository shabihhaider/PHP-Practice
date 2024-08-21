<?php

const BASE_PATH = __DIR__ . "/../";  // __DIR__ is a magic constant that returns the directory of the current file and /../ is used to go up one directory

require BASE_PATH . "functions.php";

spl_autoload_register(function ($class) {
    // var_dump(base_path($class . ".php")); // You can use this to debug the path

    require base_path("Core/{$class}.php");
});

require base_path("router.php");