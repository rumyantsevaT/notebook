<?php
//var_dump($_GET, $_POST);



//Изменение | обновлнеие существующей задачи
function updateTask($data)
{
    $pgo = new PDO ("mysql:host=localhost;dbname=notebook;charset=utf8", "root", "root");
    $sql = "UPDATE tasks SET title=:title, content=:content WHERE id=:id";
    $statement = $pgo->prepare($sql);
    $statement->execute($data);
    
    header("Location: /"); exit;
}

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];
updateTask($data);