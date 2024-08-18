<?php

require "functions.php";

// require "router.php";

require "Database.php";

$config = require("config.php");

$db = new Database($config['Database']);

// Now it's more secure to use the query method to prevent 'SQL INJECTION'
$id = $_GET['id'];
$query = "SELECT * FROM posts where id = :id"; // Make sure never ever inline use your data in query string. Always use prepared statements. means use ? instead of $id and ? is a placeholder for the value of $id or we can use named placeholders like :id

$posts = $db->query($query, [':id' => $id])->fetch();

dd($posts);