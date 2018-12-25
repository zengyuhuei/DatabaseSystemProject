<?php
    
    include_once "connect_sql.php";
	
	$id = $_POST["ID"];
	$type = $_POST["type"];
	$growing_rate = 0;
	$name = $_POST["name"];
	
	$query = "insert into dude values(null,'$type',$growing_rate,'$name')";
	echo $query;
	$stmt = $db->prepare($query);
	$stmt->execute();
	
	header('Location: life.php');
?>

