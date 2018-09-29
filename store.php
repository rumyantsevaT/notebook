<?php
// проверим получаемые данные из формы
//var_dump($_POST);

//Вставить в таблицу Tasks в столбцы () следующие значения ()
$pdo = new PDO ("mysql:host=localhost; dbname=notebook01", "root", "root");

//передаем данные через метки, чтобы избежать sql иньекций
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
$statement = $pdo->prepare($sql);
// Связываем наши метки и полученные значения из формы
//$statement->bindParam(":title", $_POST['title']);
//$statement->bindParam(":content", $_POST['content']);
//$statement->execute(); //true or false

//или можно передать данные из $_POST напрямую и он сообразит что куда подставить
$statement->execute($_POST); //true or false


header("Location: /notebook/index.php"); exit;