<?php

use Core\Validator;
use Core\Database;


$config = require base_path("config.php");
$db = new Database($config['Database']);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "A body is not more than 1,000 characters is required";
}

if (! empty($errors)) {
    // Validation failed
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

// If there is no errors then insert the note into the database

    $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    // And Redirect to the notes page
    header("location: /notes");
    die();
