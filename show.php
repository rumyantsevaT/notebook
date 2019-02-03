<?php
//вывод одной задачи
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

$id = $_GET['id'];
$task = getTask($id);
?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Show task</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $task['title'];?></h1>
            <p><?= $task['content'];?></p>
            <a href="/" class="btn btn-primary">Go back</a>
        </div>
        <!-- /.col-12 -->
    </div>
</div>
</body>
</html>
