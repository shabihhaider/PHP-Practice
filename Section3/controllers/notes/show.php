<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['Database']);

$cuurentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Make sure current user is deleting his own note
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrAbort();
    authorization($note['user_id'] === $cuurentUserId);

    // form was submitted. Delete the note
    // Write the query to delete the note from the database

    $db->query("DELETE FROM notes WHERE id = :id", [
        'id' => $_GET['id']
    ]);

    // Redirect to the notes page
    header("location: /notes");
    exit();

} else {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrAbort();

    authorization($note['user_id'] === $cuurentUserId); // (403) Other user's are not authorized to view this note except the owner of the note (current user). Note exists in the database but that note don't created by the current user

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}