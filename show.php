<?php
include_once "connect_sql.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>


<?php
	
	
	echo "<table border=1 width=400 cellpadding=5>";
		echo "<tr>
			<td>id</td>
			<td>type</td>
			<td>growing_rate</td>
			<td>name</td>
		      </tr>";
	
	$query = ("select * from dude");
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	for($i = 0; $i <count($result);$i++)
	{
		echo "<tr>";
		echo "<td>".$result[$i]['ID']."</td>";
		echo "<td>".$result[$i]['type']."</td>";
		echo "<td>".$result[$i]['growing_rate']."</td>";
		echo "<td>".$result[$i]['name']."</td>";
	}
	echo "</tr></table>";
?>




</body>
</html>
