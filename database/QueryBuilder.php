<?php

class QueryBuilder
{
    //Список задач
    function getAllTasks()
    {
        //1 Подключиться к базе данных через класс pdo
        $pdo = new PDO("mysql:host=localhost; dbname=notebook", "root", "root");
        
        //2 подготовить запрос prepare statement
        $statement = $pdo->prepare("SELECT * FROM tasks");
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }
    
    //Сохранение новой задачи
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
    }
    
    //вывод | показ одной задачи
    function getTask($id)
    {
        //редактирование одной записи по id
        $pdo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $task;
    }
    
    //Изменение | обновлнеие существующей задачи
    function updateTask($data)
    {
        $pgo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
        $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
        $statement = $pgo->prepare($sql);
        $statement->execute($data);
    }
    
    //Удаление задачи
    function deleteTask($id)
    {
        $pdo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
        $sql = "DELETE FROM tasks WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}