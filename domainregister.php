<?php
session_start();
session_destroy();
$msg = "";

include 'config.php';

if (isset($_POST['domain_register'])) {
	$d_name = $_POST['d_name'];
	$d_pass = $_POST['d_pass'];
	$d_cpass = $_POST['d_cpass'];
	$d_email = $_POST['d_email'];
	$d_mob = $_POST['d_mob'];
	$d_descr = $_POST['d_descr'];
	$d_address = $_POST['d_address'];
	
	
	if($d_pass!=$d_cpass){
		$msg = "Password do not matach";
	}
	else{
		$d_id = rand() % 9999;
		$d_veri = rand();
		$SQL = "INSERT INTO domain(d_name , d_pass , d_email , d_mob , d_descr , d_address , d_id  ) VALUES ('$d_name','$d_pass','$d_email','$d_mob','$d_descr','$d_address','$d_id' )";
		$result = mysql_query($SQL);
		$SQL1 = "INSERT INTO info (email,password,position) VALUES ('$d_email', '$d_pass', 'admin')";
		$result1=mysql_query($SQL1);
		if($result1){
			print("<script>location.href = 'userlogin.php'</script>");
		}	
	}
}
?>							
	









<!DOCTYPE html>
<html lang="en">
<head>

<!-- favicons -->	

	<title>Register your domain here</title>
	<link rel="shortcut icon" href="images/timesch.jpg" type="image/x-icon">

<!-- meta-->	

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="It is a time scheduling app for a specific organisation.">
	<meta name="author" content="vasundhra sharma,kshitiz gupta,sakshi sharma,rishabh kapoor,sanyam jain and pushpendra bansal">

<!-- stylesheet-->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/domain_style.css">

<!-- bootstrap-->	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- icons-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- js scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		
</head>

<body>


<nav class="header">
  <div class="container">
    <div class="navbar-header title">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <img src="images/icon.png">
      </button>
      <a class="navbar-brand" href="index.php">docket</a>
    </div>
   
  </div>
</nav>


<div class="main">
<div class="container">
	
	<div class="col-md-12 domain_form">
		
    	<div class="row ">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-xs-4 col-md-offset-4">
								<a href="#" id="register-form-link" class="active">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
						
								
							<form id="domain_register_1" action="domainregister.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="d_email" tabindex="2" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="password" name="d_pass" tabindex="1" class="form-control" placeholder="Password" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="d_cpass" tabindex="1" class="form-control" placeholder="Password Again" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="d_name" tabindex="2" class="form-control" placeholder="Domain Name" required>
									</div>
									
									<div class="form-group">
										<input type="text" name="d_mob" tabindex="2" class="form-control" placeholder="Corresponding mobile" required>
									</div>
									<div class="form-group">
										<input type="text" name="d_address" tabindex="2" class="form-control" placeholder="address" required>
									</div>
									<div class="form-group">
										<input type="text" name="d_descr" tabindex="2" class="form-control" placeholder="Description" required>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<?php echo $msg ; ?>
												<input type="submit" name="domain_register"  tabindex="4" class="form-control  btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	
	</div>

</div>
</div>	
	<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="about.html">About Us</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="domain.html">Domain</a></li>

			</ul>
		</div>
	
		</div>
	</div>
</body>
</html>