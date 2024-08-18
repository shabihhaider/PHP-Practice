<?php

// connect to our MySQL database and execute a query

class Database {

    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=demo;user=root;charset=utf8mb4"; // Also we can set a password here
        $this->connection = new PDO($dsn); // PDO = PHP Data Object
    }

    public function query($query) 
    {
        $statement = $this->connection->prepare($query); // Prepare a SQL statement
        $statement->execute(); // Execute the SQL statement
        return $statement;
    }
}