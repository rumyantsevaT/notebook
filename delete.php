<?php
$id = $_GET['id'];
$pdo = new PDO ("mysql:host=localhost; dbname=testsiteall02", "root", "root");
$sql = "DELETE FROM tasks WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();

header("location: /notebook/index.php"); exit;