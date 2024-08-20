<?php

$config = require("config.php");
$db = new Database($config['Database']);

$heading = "Note";
$cuurentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetch();

if(!$note) {
    abort(); // If the note does not exist (in the database), then abort the request and show 404 page
}


if($note['user_id'] !== $cuurentUserId) {
    abort(Response::FORBIDDEN); // (403) Other user's are not authorized to view this note except the owner of the note (current user). Note exists in the database but that note don't created by the current user
}

require "views/note.view.php";