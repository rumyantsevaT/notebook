<?php
//var_dump($_GET, $_POST);

require './database/QueryBuilder.php';

$db = new QueryBuilder();


$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];
$db->update("tasks", $data);

header("Location: /"); exit;