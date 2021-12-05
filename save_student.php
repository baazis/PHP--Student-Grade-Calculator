<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$reg = $_POST['reg'];
		$name = $_POST['name'];
		$cat_1 = $_POST['cat_1'];
		$cat_2 = $_POST['cat_2'];
		$assign_1 = $_POST['assign_1'];
		$quiz_1 = $_POST['quiz_1'];
		$quiz_2 = $_POST['quiz_2'];
		$fat = $_POST['fat'];
		
		
		$sqlcommand = "INSERT INTO `student` VALUES('$reg','$name', '$cat_1', '$cat_2', '$assign_1', '$quiz_1', '$quiz_2', '$fat')";
		mysqli_query($conn, $sqlcommand) or die(mysqli_error($conn));
		
		header("location: index.php");
	}
?>