<?php

// connect to our MySQL database and execute a query

class Database {

    public $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';'); // http_build_query($array, $prefix, $separator) $prefix = '' (default), $separator = '&' (default)

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch the results as an associative array
        ]); // PDO = PHP Data Object PDO($dsn, $username, $password, $options) $options = [] (optional)
    }

    public function query($query) 
    {
        $statement = $this->connection->prepare($query); // Prepare a SQL statement
        $statement->execute(); // Execute the SQL statement
        return $statement;
    }
}