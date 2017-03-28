<?php
session_start();
session_destroy();
$user = "";
$pass = "";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'config.php';

	$uemail = $_POST['uemail'];
	$upassword = $_POST['upassword'];
		
	//unwanted HTML (scripting attacks)
	$uemail = htmlspecialchars($uemail);
	$upassword = htmlspecialchars($upassword);
	
	$SQL = "SELECT * FROM info";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['email'];
		$b = $db_field['password'];
		$pos = $db_field['position'];
		$dom = $db_field['domain'];
		if(($uemail == $a) AND ($upassword == $b)){
			if($pos == "admin"){
				session_start();
				$_SESSION['username'] = $uemail;
				$_SESSION['admin'] = "log";
				mysql_close($db_handle);
				header("Location: domainhome.php");
				break;
			}
			else if($pos == "member"){
				if($dom==''){
						session_start();
						$_SESSION['username'] = $uemail;
						$_SESSION['member'] = "log";
						mysql_close($db_handle);
						header("Location:user_domain.php");
						break;
				}
				else{
						session_start();
						$_SESSION['username'] = $uemail;
						$_SESSION['member'] = "log";
						mysql_close($db_handle);
						header("Location: userhomepage.php");
						break;
					}
			}
		}
	}
	$msg = "Check username and/or password.";
	mysql_close($db_handle);
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

<div class="main" style="background:url(images/head1.jpg);">
<div class="container">
	
	<div class="user_login col-md-4 col-md-offset-8" id="login" >
			<h2>Login</h2>
			<form method="post" action="userlogin.php" name="user_login">
				 <p><span ><me class="fa fa-user" aria-hidden="true"></me></span><input type="text" value="Email Id" onBlur="if(this.value == '') this.value = 'Email Id'" onFocus="if(this.value == 'Email Id') this.value = ''" required name="uemail"></p> 
				 <p><span class="fa fa-lock"></span><input type="password"  value="Password" onBlur="if(this.value == '') this.value 	= 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required name="upassword"></p>
				 <?php echo $msg ; ?> 
           		 <p><input type="submit" value="Sign In" name="user_login_submit"></p>
			</form>
			
			<p><a href="usersignup.php" class="blue"> Sign up now</a></p>
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