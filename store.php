<?php
// проверим получаемые данные из формы со страницы create.php
//var_dump($_POST);

require 'database/QueryBuilder.php';

$db = new QueryBuilder();

$db->addTask($_POST);

header("Location: /"); exit;

