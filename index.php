<?php
error_reporting(E_ALL);

require 'database/QueryBuilder.php';

$db = new QueryBuilder();
//$tasks = $db->getAllTasks();

$tasks = $db->all('tasks');
?>

<!doctype html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Блокнот задач</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>All Tasks</h1>
			<a href="create.php" class="btn btn-success">Add Task</a>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">id</th>
						<th scope="col">Title</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($tasks as $task):?>
					<tr>
						<th scope="row"><?= $task["id"];?></th>
						<td><?= $task["title"];?></td>
						<td>
							<a href="show.php?id=<?= $task['id'];?>" class="btn btn-info">Show</a>
							<a href="edit.php?id=<?= $task['id'];?>" class="btn btn-warning">Edit</a>
							<a onclick="return confirm('Вы уверены, что хотите удалить запись?')" href="delete.php?id=<?= $task['id'];?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			</div>
			<!-- /.col-12 -->
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
