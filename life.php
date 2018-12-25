
<!DOCTYPE html>
<?php
session_start();
include_once "connect_sql.php";
if(!$_SESSION['username'])
{
	header('Location: index.html');
}

?>
<html>
   <head>
      <meta charset = "utf-8">
      <title>life</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	  <script src="./js/life.js" ></script>
	  <link rel="stylesheet" href="./css/all.min.css">
	  <link rel="stylesheet" href="./css/life.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	  
      <script>
	
	  </script>
   </head>
   <body>

   		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		 	<a class = "thick navbar-brand text-white font-weight-bold">農場生活遊戲後台設置</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item mr-2">
						<form class="form-inline my-2 my-lg-0" action="search.php" method="post" >
							<input class="form-control mr-sm-2" type="search"  name="keyword" placeholder="暱稱查詢" aria-label="暱稱查詢">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					</li>

					

					<li class="nav-item mr-2">
						<button class=" btn btn-outline-primary my-2 my-sm-0"  data-toggle="modal" data-target="#exampleModal">成長值最大<span class="sr-only">(current)</span></button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">生態圈裡目前營養值最大</h5>
								<button type="button" id="max" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class = "table table-hover" id="farm">
									<thead class="thead-dark">
										<tr>
											<th>ID</th>
											<th>type</th>
											<th>name</th>
											<th>growing_rate</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = ("select id,type,name,growing_rate 
										from (select * from dude UNION select * from farm) as q 
										where growing_rate = 
											(select max(growing_rate) 
											from (select * from dude UNION select * from farm) as T)");
										$stmt = $db->prepare($query);
										$stmt->execute();
										$result = $stmt->fetchAll();
										
										for($i = 0; $i <count($result);$i++)
										{
											echo "<tr>";
											echo "<td>".$result[$i]['id']."</td>";
											echo "<td>".$result[$i]['type']."</td>";
											echo "<td>".$result[$i]['name']."</td>";
											echo "<td>".$result[$i]['growing_rate']."</td>";
											echo "</tr>";
										}
									?>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
							</div>
						</div>
						</div>
					</li>
					<li class="nav-item">
						<a href='logout.php' class="btn btn-outline-danger my-2 my-sm-0">登出</a>;
					</li>
				</ul>
				
		  	</div> 
		</nav>	
   	   	<div class="container-fluid">
		  <div class="row">
		    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 my-2 px-1">
		    	
		     	<table class = "table table-hover" id="farm">
		     		<thead class="thead-dark">
						<tr class="text-small">
							<th>ID</th>
							<th>類型</th>
							<th>成長</th>
							<th>暱稱</th>
							<th>修改</th>
						 </tr>
					</thead>
					<?php
						$query = ("select * from farm");
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
							echo "<td><input type='button' class='btn btn-outline-info mr-1' value='Edit' onclick='edit(this)' >";
							echo "<span class='fas fa-trash-alt cursor-ptr' onclick='deleteData(this)'></span></td>";
							echo "</tr>";
						}
					?>
			  </table>
			   
			  <?php
					$query = ("select  type,count(id)  as total from farm group by type;");

					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
				
					echo "<div class='row justify-content-center'>";
						echo "<div class='col-sm-auto col-12 btn-group' role='group' aria-label='Basic example'>";
						echo "<a class='btn btn-outline-dark' href='farm_insert_interface.php'>新增</a>";
						for($i = 0; $i <count($result);$i++)
						{
							echo "<button type='button' class='btn btn-outline-dark' disabled>";
							echo $result[$i]['type'].":";
							echo $result[$i]['total'];
							
						}
						    
						echo "</div>";
					echo "</div>";

				?>
		    </div>
		    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 my-2 px-1">
		      <table class = "table table-hover" id="pound">
		      	<thead class = "thead-dark"> 
					<tr class="text-small">
						<th>ID</th>
						<th>類型</th>
						<th>暱稱</th>
						<th>修改</th>
					 </tr>
				</thead>
				<?php
					$query = ("select * from pound");
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					for($i = 0; $i <count($result);$i++)
					{
						echo "<tr>";
						echo "<td>".$result[$i]['ID']."</td>";
						echo "<td>".$result[$i]['type']."</td>";
						echo "<td>".$result[$i]['name']."</td>";
						echo "<td><input type='button' class='btn btn-outline-info mr-1' value='Edit' onclick='edit(this)' >";
						echo "<span class='fas fa-trash-alt cursor-ptr' onclick='deleteData(this)'></span></td>";
						echo "</tr>";
					}
				?>
			  </table>
			  <?php
					$query = ("select  type,count(id)  as total from pound group by type;");

					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
				
					echo "<div class='row justify-content-center'>";
						echo "<div class='col-sm-auto col-12 btn-group' role='group' aria-label='Basic example'>";
						echo "<a class='btn btn-outline-dark' href='pound_insert_interface.php'>新增</a>";
						for($i = 0; $i <count($result);$i++)
						{
							echo "<button type='button' class='btn btn-outline-dark' disabled>";
							echo $result[$i]['type'].":";
							echo $result[$i]['total'];
						}
						    
						echo "</div>";
					echo "</div>";

				?>
			</div>
		    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 my-2 px-1">
		      	<table class = "table table-hover" id="dude">
		      		<thead class = "thead-dark">
						<tr class="text-small">
							<th>ID</th>
							<th>類型</th>
							<th>成長</th>
							<th>暱稱</th>
							<th>修改</th>
						 </tr>
					</thead>
					<?php
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
							echo "<td><input type='button' class='btn btn-outline-info mr-1' value='Edit' onclick='edit(this)' >";
							echo "<span class='fas fa-trash-alt cursor-ptr' onclick='deleteData(this)'></span></td>";
							echo "</tr>";
						}
					?>
					
				</table>
				
				<div class='row justify-content-center'>
					<div class='col-sm-auto col-12 btn-group' role='group' aria-label='Basic example'>
						<a class='btn btn-outline-dark' href='dude_insert_interface.php'>新增</a>
						<?php
							$query = ("select  type,count(id)  as total from dude group by type;");

							$stmt = $db->prepare($query);
							$stmt->execute();
							$result = $stmt->fetchAll();
								for($i = 0; $i <count($result);$i++)
								{
									echo "<button type='button' class='btn btn-outline-dark' disabled>";
									echo $result[$i]['type'].":";
									echo $result[$i]['total'];
									
								}
						?>
					</div>
				</div>
			</div>
		    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 my-2 px-1">
		      <table class = "table table-hover" >
		      	<thead class = "thead-dark">
					<tr class="text-small">
						<th>類型</th>
						<th>賣出</th>
						<th>買入</th>
						<th>營養值</th>
					 </tr>
				</thead>
					<?php
					$query = ("select * from shop");
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->fetchAll();
					
					for($i = 0; $i <count($result);$i++)
					{
						echo "<tr>";
						echo "<td>".$result[$i]['type']."</td>";
						echo "<td>".$result[$i]['sold_price']."</td>";
						echo "<td>".$result[$i]['bought_price']."</td>";
						echo "<td>".$result[$i]['nutrition']."</td>";
					}
					?>
					</tr>
			  </table>
		    </div>
		  </div>
		</div>
		    
	
				
			
		
   </body>
</html>

