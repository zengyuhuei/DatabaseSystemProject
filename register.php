

<!DOCTYPE html>


<html>
   <head>
        <meta charset = "utf-8">
        <title>農村生活</title>

	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
		<script src="./js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/index.css">
   </head>
   <body>
		<section class="login-block">
				<div class="container">
				<div class="row">
					<div class="col-md-4 login-sec">
						<h2 class="text-center">Register</h2>
                 <form name="form" method="post" action="register_finish.php">
					<div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase" >Username</label>
						<input type="text" name="id" class="form-control" placeholder="">
						
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Password</label>
						<input type="password" name="pw"class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Password Again</label>
						<input type="password" name="pw2"class="form-control" placeholder="">
					</div>
					
					
						<div class="form-check">
						
						
						<button type="submit" class=" btn-outline-success my-2 my-sm-0 btn btn-login float-right">Submit</button>
						
					</div>
					
			  
				</form>
				 <button class="btn btn-login btn-outline-success my-2 my-sm-0" onclick="window.location.href='index.html'">取消</button>
					</div>
					<div class="col-md-8 banner-sec">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							 <ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							  </ol>
						<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
				  <img class="d-block img-fluid" src="./img/dude.PNG" alt="First slide">
				 
				</div>
				<div class="carousel-item">
				  <img class="d-block img-fluid" src="./img/main.PNG" alt="First slide">
				
				</div>
				<div class="carousel-item">
				  <img class="d-block img-fluid" src="./img/shop.PNG" alt="First slide">
				  
			  </div>
						</div>	   
						
					</div>
				</div>
			</div>
			</section>
   </body>
</html>
