<?php


$config = require("config.php");
$db = new Database($config['Database']);

$heading = "My Notes";

$notes = $db->query("SELECT * FROM notes WHERE users_id = 6")->fetchAll();

require "views/notes.view.php";