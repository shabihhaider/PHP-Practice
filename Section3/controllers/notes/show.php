<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['Database']);

$currentUserId = 1;
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrAbort();

authorization($note['user_id'] === $currentUserId); // (403) Other user's are not authorized to view this note except the owner of the note (current user). Note exists in the database but that note don't created by the current user

view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
]);