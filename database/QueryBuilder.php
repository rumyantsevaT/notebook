<?php

class QueryBuilder
{
    public $pdo;
    
    function __construct()
    {
        //1 Подключиться к базе данных через класс pdo
        $this->pdo = new PDO("mysql:host=localhost; dbname=notebook", "root", "root");
    }
    
    // Новый список задач универсальный в index.php
    function all($table)
    {
        //2 подготовить запрос prepare statement
        $statement = $this->pdo->prepare("SELECT * FROM $table");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
//    function getTask($id)
//    {
//        //редактирование одной записи по id
////        $pdo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
//        $sql = "SELECT * FROM tasks WHERE id=:id";
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindParam(":id", $id);
//        $statement->execute();
//        $task = $statement->fetch(PDO::FETCH_ASSOC);
//
//        return $task;
//    }

    //Новый вывод | показ одной задачи show.php, edit.php
    function getOneById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $results;
    }
    
    //Удаление задачи
    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
    
    
    //Сохранение добавлелние новой задачи
    function store($table, $data)
    {
        //передаем данные через метки, чтобы избежать sql иньекций
        $sql = "INSERT INTO $table (title, content) VALUES (:title, :content)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true or false
        // Связываем наши метки и полученные значения из формы
//    $statement->bindParam(":title", $_POST['title']);
//    $statement->bindParam(":content", $_POST['content']);
//    $statement->execute(); //true or false

//или можно передать данные из $_POST напрямую и он сообразит что куда подставить
    }
    
    //Изменение | обновлнеие существующей задачи
    function update($table, $data)
    {
//        $pgo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
        $sql = "UPDATE $table SET title=:title, content=:content WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
}