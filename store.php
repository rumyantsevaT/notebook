<?php

//Вставить в таблицу Tasks в столбцы () значения ()

$pdo = new PDO ("mysql:host=localhost; dbname=testsiteall02", "root", "root");
$sql = "INSERT INTO tasks (title, content) values (:title, :content)"; //передаем данные через метки
$statement = $pdo->prepare($sql);
// Связываем наши метки и полученные значения из формы
$statement->bindParam(":title", $_POST['title']);
$statement->bindParam(":content", $_POST['content']);
$statement->execute(); //true or false

header("Location: localhost/");exit;