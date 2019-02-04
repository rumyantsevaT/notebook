<?php
require './database/QueryBuilder.php';

$db = new QueryBuilder;

//$db->addTask($_POST);
$db->addOne("tasks");

header("Location: /"); exit;

