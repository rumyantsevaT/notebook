<?php
// проверим получаемые данные из формы со страницы create.php
//var_dump($_POST);

//Здесь сохранение новой задачи

function addTask($data)
{
    //Вставить в таблицу Tasks в столбцы () следующие значения ()
    $pdo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");

    //передаем данные через метки, чтобы избежать sql иньекций
    $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
    $statement = $pdo->prepare($sql);
    $statement->execute($data); //true or false
    // Связываем наши метки и полученные значения из формы
//    $statement->bindParam(":title", $_POST['title']);
//    $statement->bindParam(":content", $_POST['content']);
//    $statement->execute(); //true or false

//или можно передать данные из $_POST напрямую и он сообразит что куда подставить
    header("Location: /"); exit;
}


addTask($_POST);

