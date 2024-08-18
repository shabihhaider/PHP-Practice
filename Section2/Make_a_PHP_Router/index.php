<?php

require "functions.php";

// require "router.php";

require "Database.php";

$config = require("config.php");

$db = new Database($config['Database']);
$posts = $db->query("SELECT * FROM posts where id = 1")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);