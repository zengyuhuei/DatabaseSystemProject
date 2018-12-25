<?php
    
    include_once "connect_sql.php";

	$type = $_POST["type"];
	$name = $_POST["name"];	
	$query = "insert into pound values(null,'$type','$name')";
	echo $query;
	$stmt = $db->prepare($query);
	$stmt->execute();
	
	header('Location: life.php');
?>

