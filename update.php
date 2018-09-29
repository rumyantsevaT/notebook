<?php
//var_dump($_GET, $_POST);

$data = [
		"id" => $_GET['id'],
		"title" => $_POST['title'],
		"content" => $_POST['content']
];
$pgo = new PDO ("mysql:host=localhost; dbname=notebook01", "root", "root");
$sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
$statement = $pgo->prepare($sql);
$statement->execute($data);


header("Location: /notebook/index.php"); exit;