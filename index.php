<?php 
	
	require_once ('db.php');
	require_once ('pdo_db.php');
	require_once ('Models/Student.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD using PDO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container">
		
	<h1>Students</h1>
	<hr>

	<form method="POST">
		<div class="form-group">
			<label forName="name">Name</label>
			<input class="form-control" type="text" name="name" required autofocus placeholder="Yash Desai">
		</div>
		<div class="form-group">
			<label forName="class">Class</label>
			<input class="form-control" type="class" name="class" required placeholder="TY. B.Sc">
		</div>
		<input class="btn btn-success" type="submit" name="add" value="Add">
	</form>
<hr>
<?php 
	$student = new Student();
	if(isset($_POST["add"])){
		$name = $_POST["name"];
		$class = $_POST["class"];

		$studetData = [
			"name"=>$name,
			"class"=>$class
		];
		
		$student->addStudent($studetData);
	}
	
	$students = $student->getStudents();

 ?>

	 <table class="table table-striped">
	 	<thead>
	 		<tr>
	 			<th>ID</th>
	 			<th>Name</th>
	 			<th>Class</th>
	 			<th>Action</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php foreach($students as $stud): ?>
	 			<tr>
	 				<td><?=$stud->id?></td>
	 				<td><?=$stud->name?></td>
	 				<td><?=$stud->class?></td>
	 				<td>
	 					<a class="btn btn-danger" href="delete.php/?id=<?=$stud->id?>">Delete</a>
	 					<a class="btn btn-info" href="update.php/?id=<?=$stud->id?>">Update</a>
	 				</td>
	 			</tr>
	 		<?php endforeach; ?>
	 	</tbody>
	 </table>
	</div>

</body>
</html>



