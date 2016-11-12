<?php
session_start();
session_destroy();
$msg = "";

include 'config.php';

if (isset($_POST['domain_submit'])) {
	$domain_name = $_POST['domain_name'];
	$domain_rem = $_POST['domain_rem'];
	$domain_mob = $_POST['domain_mob'];
	$domain_email = $_POST['domain_email'];
	
	if(!$domain_rem){
		$msg = "You must have to agree with terms and Conditions";
	}
	else{
		$SQL = "INSERT INTO domain_register(domain_name,domain_email,domain_mob) VALUES ('$domain_name', '$domain_email', '$domain_mob')";
		mysql_query($SQL);

require_once "PHPMailer-master/PHPMailerAutoload.php";
$mail = new PHPMailer;
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires autantication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "docketswe@gmail.com";                 
$mail->Password = "pushpendra";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "docketswe@gmail.com";
$mail->FromName = "docket";

$mail->addAddress($domain_email, $domain__name);

$mail->isHTML(true);

$mail->Subject = "Please fill up this form";
$mail->Body = "click on this link -> http://localhost/swe/domainform.php";

		print("<script>location.href = 'domainsignup.html'</script>");	

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
	<script src="js/jquery.1.11.1.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/task.js"></script>

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
						
								
							<form id="domain_register" action="domain.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="domain_name" tabindex="1" class="form-control" placeholder="Name" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="domain_email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="domain_mob" tabindex="2" class="form-control" placeholder="Mobile Number" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="domain_rem" id="remember">
										<label for="remember"> I Agree to the docket <a href="#">Terms & Conditions</a></label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<?php echo $msg ; ?>
												<input type="submit" name="domain_submit"  tabindex="4" class="form-control  btn-register" value="Register Now">
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