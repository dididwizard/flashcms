<?php
error_reporting(0);

$dbc = mysqli_connect("localhost", "root", "", "flashcms");
$title = $_POST['title'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];
$id = "1";

$update = $dbc->prepare("UPDATE site SET title=?, description=?, keywords=? WHERE id=?");
$update->bind_param('ssss', $title, $description, $keywords, $id);
$update->execute();