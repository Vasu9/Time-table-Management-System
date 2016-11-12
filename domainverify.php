<?php 
session_start();
session_destroy();
$msg = "";

include 'config.php';

if (isset($_POST['domain_register_verify'])) {
	$user_email = $_POST['user_email'];
	$ver = $_POST['ver'];
	$SQL = "SELECT * FROM domain";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['d_email'];
		$b = $db_field['d_veri'];
		if(($a == $user_email) AND ($b == $ver)){
			$SQL = "SELECT * FROM domain WHERE d_email = '$user_email'";
			$result = mysql_query($SQL);
			while($db_field = mysql_fetch_assoc($result)){
				$user_email = $db_field['d_email'];
				$user_pass = $db_field['d_pass'];
			}
			$SQL = "INSERT INTO info (email,password,position) VALUES ('$user_email', '$user_pass', 'admin')";
			mysql_query($SQL);
			$msg = "Account verification is succesful.";
			
			print("<script>location.href = 'domainhome.php'</script>");
		}
		else{
			$msg = "Account verification is NOT succesful.";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- favicons -->	

	<title>docket : time scheduling app</title>
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
								<a href="#" id="register-form-link" class="active">Verification Code</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
						
								
							<form id="domain_register_1" name='domainregister' action='domainverify.php'method="post" role="form" style="display: block;">
					
									<div class="form-group">
										<input type="text" name="user_email" tabindex="1" class="form-control" placeholder="Userame" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="ver" tabindex="1" class="form-control" placeholder="Verificatin code" value="" required>
									</div>
									<p><?php print $msg; ?></p>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<?php echo $msg ; ?>
												<input type="submit" name="domain_register_verify"  tabindex="4" class="form-control  btn-register" value="Register Now">
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
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Domain</a></li>

			</ul>
		</div>
	
		
		</div>
	</div>
</body>
</html>