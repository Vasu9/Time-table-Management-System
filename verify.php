<?php 
session_start();
session_destroy();
$msg = "";

include 'config.php';

if (isset($_POST['user_register_verify'])) {
	$user_email = $_POST['user_email'];
	$ver = $_POST['ver'];
	$SQL = "SELECT * FROM user_register";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['user_email'];
		$b = $db_field['verification_code'];
		if(($a == $user_email) AND ($b == $ver)){
			$SQL = "SELECT * FROM user_register WHERE user_email = '$user_email'";
			$result = mysql_query($SQL);
			while($db_field = mysql_fetch_assoc($result)){
				$user_email = $db_field['user_email'];
				$user_pass = $db_field['user_pass'];
			}
			$SQL = "INSERT INTO info (email,password,position,mobile) VALUES ('$user_email', '$user_pass', 'member','$mobile')";
			mysql_query($SQL);
			$msg = "Account verification is succesful.";
			
			print("<script>location.href = 'userlogin.php'</script>");
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
	<link rel="stylesheet" type="text/css" href="css/user_login_style.css">

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
	
	<div class="user_login col-md-6 col-md-offset-4" id="login">
			<h2>Verification code</h2>
			<form method='post'  name='user_register' action='verify.php'>
				 <p><span class="fa fa-envelope-o"></span><input type="text" name="user_email" placeholder="Email Id" required></p>
				 <p><span ><i class="fa fa-user-secret" aria-hidden="true"></i></span><input type="text" placeholder="Verification code" required name="ver"></p> 
				 
           		 <p><input type="submit" value="submit" name="user_register_verify"></p>
			</form>
			<p><?php print $msg; ?></p>
			<p>OR</p>
			<div class="social_fb">
				<i class="fa fa-facebook fa-2x"></i>
				<i class="fa fa-twitter fa-2x"></i>  
				<i class="fa fa-google fa-2x"></i>	
			</div>
			
			
			<p>Already have an account ?  <a href="#" class="blue"> Sign In now</a></p>
			
	
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