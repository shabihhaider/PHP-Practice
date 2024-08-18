<?php

require "functions.php";

// require "router.php";

// connect to our MySQL database

$dsn = "mysql:host=localhost;port=3306;dbname=demo;user=root;charset=utf8mb4"; // Also we can set a password here

$pdo = new PDO($dsn); // PDO = PHP Data Object

$statement = $pdo->prepare("SELECT * FROM posts"); // Prepare a SQL statement
$statement->execute(); // Execute the SQL statement
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all the results and remove duplication by 'FETCH_ASSOC' (Associative Array) otherwise it will return both Associative and Indexed Array

foreach ($posts as $post) {
    echo "<li>" . $post['Title'] . "</li>";
}