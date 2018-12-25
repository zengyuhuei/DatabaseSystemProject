<!DOCTYPE html>
<?php
session_start();
include_once "connect_sql.php";
if(!$_SESSION['username'])
{
	header('Location: index.html');
}

?>
<html lang="en">
<head>
<title>Dude_insert</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="./js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">牧場動物新增</a>
    </div>
    <ul class="nav navbar-nav navbar-right"">
		<form action="life.php" method="get" >
		<button type="submit" class="btn btn-danger navbar-btn">Home</button>
		</form>
    </ul>
  </div>
</nav>
<body>

<div class="container">
  <br>
  <form action="Dude_insert.php" method="post">
      <div class="form-group">
      <label for="type">Type:</label>
      <select class="form-control input-sm" name="type">
        <option>牛</option>
        <option>豬</option>
        <option>雞</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Name: (可空白)</label>
      <input class="form-control" name="name" type="text" value=" ">
    </div>
    <br>
    <button type="submit" class = "btn btn-outline-info my-2 my-sm-0">確定新增</button>
  </form>
  <br>

</div>
  
</body>
</html>
