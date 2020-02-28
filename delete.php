<?php 

	require_once ('db.php');
	require_once ('pdo_db.php');
	require_once ('Models/Student.php');

	$id = $_GET["id"];

	$student = new Student();

	

	if($student->removeStudent($id))
		header('location:http://localhost/pdo/index.php');
	else
		echo "Err";
 ?>