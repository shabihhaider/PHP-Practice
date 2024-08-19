<?php


$config = require("config.php");
$db = new Database($config['Database']);

$heading = "Note";

$notes = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetchAll();

require "views/notes.view.php";