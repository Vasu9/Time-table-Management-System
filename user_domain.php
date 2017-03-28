

<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}


if (isset($_POST['user_domain_submit'])) {
	$user_domain= $_POST['user_domain'];
	$SQL = "UPDATE info SET domain  = '$user_domain' WHERE email = '$user'";
	$result = mysql_query($SQL);
	header("Location: userhomepage.php");
	break;
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
			<h2>Domain ID</h2>
			<form method='post'  name='user_domain' action='user_domain.php'>
				 <p><span class="fa fa-envelope-o"></span><input type="text" name="user_domain" placeholder="Domain ID" required></p>
				
				 
           		 <p><input type="submit" value="submit" name="user_domain_submit"></p>
			</form>
			<p><?php print $msg; ?></p>
			
	</div>
</div>
</div>	
	<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				
			</ul>
		</div>
	
		
		</div>
	</div>
</body>
</html>