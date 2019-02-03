<?php
//Удаление задачи

function deleteTask($id)
{
    $pdo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
    $sql = "DELETE FROM tasks WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->execute();
    
    header("location: /"); exit;
}

$id = $_GET['id'];

deleteTask($id)