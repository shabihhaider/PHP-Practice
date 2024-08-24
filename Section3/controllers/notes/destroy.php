<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['Database']);

$currentUserId = 1;


    // Make sure current user is deleting his own note
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrAbort();
    authorization($note['user_id'] === $currentUserId);

    // form was submitted. Delete the note
    // Write the query to delete the note from the database

    $db->query("DELETE FROM notes WHERE id = :id", [
        'id' => $_POST['id']
    ]);

    // Redirect to the notes page
    header("location: /notes");
    exit();

