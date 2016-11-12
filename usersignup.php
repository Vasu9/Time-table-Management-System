<?php
include 'config.php';
session_start();
session_destroy();
$msg = "";
if (isset($_POST['user_register_submit'])) {
	$user_pass = $_POST['user_pass'];
	$user_cpass = $_POST['user_cpass'];
	$user_mob = $_POST['user_mob'];
	$user_email = $_POST['user_email'];
	
	if($user_pass != $user_cpass){
		$msg = "Password did not match.";
	}
	else{
		$SQL1 = "INSERT INTO info (email,password,position) VALUES ('$user_email', '$user_pass' ,'member')";
		$result1=mysql_query($SQL1);
		if($result1){
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
$mail->Port = 465;                                   

$mail->From = "docketswee@gmail.com";
$mail->FromName = "docket";

$mail->addAddress($user_email, $user_name);

$mail->isHTML(true);

$mail->Subject = "verification_code";
$mail->Body = "hello g";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message TEMPhas been sent successfully";
}




			print("<script>location.href = 'userlogin.php'</script>");
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
			<h2>Sign Up</h2>
			<form method='post'  name='user_register' action='usersignup.php'>
				 <p><span class="fa fa-envelope-o"></span><input type="text" name="user_email" placeholder="Email Id" required></p>
				 <p><span class="fa fa-lock"></span><input type="password" name="user_pass" placeholder="Password" required></p>
				 <p><span class="fa fa-lock"></span><input type="password" name="user_cpass" placeholder="Confirm Password" required></p>
				 <p><span class="fa fa-phone"></span><input type="text" name="user_mob" placeholder="Mobile Number" required></p>
				 <p><input type="submit" value="Sign Up" name="user_register_submit"></p>
			</form>
			<p><?php print $msg; ?></p>
			<p>Already have an account ?  <a href="userlogin.php" class="blue"> Sign In now</a></p>
			
	
	</div>
</div>
</div>	
	<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
		</div>
	
				</div>
	</div>
</body>
</html>