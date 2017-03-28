<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: userlogin.php");
}
$msg = "";
if (isset($_POST['user_register_submit'])) {
	$user_pass = $_POST['user_pass'];
	$user_cpass = $_POST['user_cpass'];
	$user_mob = $_POST['user_mob'];
	$user_email = $_POST['user_email'];
	$name = $_POST['name'];
	$date = date("Y-m-d");
	
	if($user_pass != $user_cpass){
		$msg = "Password did not match.";
	}
	else{
		$SQL3 = "SELECT * FROM info";
		$result3 = mysql_query($SQL3);
		while ($db_field = mysql_fetch_assoc($result3)) {
			$a = $db_field['email'];
			if($user_email == $a){
				$msg = "email id is already register";
				break;
			}
			else{
				$sql4="SELECT * FROM domain WHERE d_email='$user'";
				$result4 = mysql_query($sql4);
				while ($db_field = mysql_fetch_assoc($result4)) {
						$domain = $db_field['d_id'];
				}		
				$sql2 ="SELECT * FROM info WHERE email = '$user_email'";
				$result2=mysql_query($sql2);
				if(mysql_num_rows($result2)){
					$msg = "email id Already exist" ;
				}
				else{
				$SQL1 = "INSERT INTO info (email,password,doj,domain,mobile,name,position) VALUES ('$user_email', '$user_pass','$date' ,'$domain',$user_mob,'$name','member')";
				$result1=mysql_query($SQL1);
				if($result1){
						print("<script>location.href = 'domainhome.php'</script>");
				}	
			}
		  }	
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
	<link rel="stylesheet" type="text/css" href="css/user_login_style.css">

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



<div class="header">
		<div class="container">
			<div class="col-md-3 title">
				<a href="index.php">docket</a>
			</div>
			
			<div class="col-md-5"></div>
			<div class="col-md-4 noti">
			
				<div class="dropdown inline">
					  <button class="notibutton dropdown-toggle" type="button" data-toggle="dropdown">
					  <i class="fa fa-user fa-2x" aria-hidden="true"></i>
					   Hello <?php print strtoupper($user); ?>
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    
					    <li><a href="domain_setting.php">Settings</a></li>
					      <li class="divider"></li>
					    <li><a href="logout.php">Log Out</a></li>
					  </ul>
					</div>
			</div>
		</div>
	</div>

<div class="main">
<div class="container">
	
	<div class="col-md-3 domainbar" >

		<i class="fa fa-pencil " aria-hidden="true"></i>
		<a href="domain_compose.php" style="color:#fff"> Compose</a>
	<br>
		<i class="fa fa-envelope " aria-hidden="true"></i>
		<a href="domain_inbox.php" style="color:#fff"> Inbox</a><?php
					  				$mess = 0;
					  				$count = 0;
					  				$sql = "SELECT * FROM messaging WHERE to_receiver = '$user' AND opened = 0";
					  				$result = mysql_query($sql);
					  				while ($db_field = mysql_fetch_assoc($result)) {
										$count = $count + 1;
									}
									mysql_close($db_handle);
										echo $count ;
								?>	
	<br>
		<i class="fa fa-send " aria-hidden="true"></i>
		<a href="domain_send.php" style="color:#fff"> Send Mail</a>
	<br>
		<i class="fa fa-plus " aria-hidden="true"></i>
		<a href="group_create.php" style="color:#fff"> Create Group</a>
	<br>
		<i class="fa fa-eye" aria-hidden="true"></i>
		<a href="domain_view_group.php" style="color:#fff">View Group</a>
	<br>
		<i class="fa fa-plus " aria-hidden="true"></i>
		<a href="add_user.php" style="color:#fff"> Add User</a>
	<br>	
		<i class="fa fa-steam" aria-hidden="true"></i>
		<a href="domain_manage_user.php" style="color:#fff">Manage User</a>		
	<br>
		<i class="fa fa-cog" aria-hidden="true"></i>
		<a href="domain_manage_setting.php" style="color:#fff">Domain Settings</a>
	
	</div>

	<div class="col-md-9 domain_form">
	
	<div class="user_login col-md-6 col-md-offset-4" id="login">
			<h2>Add User</h2>

			<form method='post'  name='user_register' action='add_user.php' role='form'>
			         <p><span class="fa fa-user"></span><input type="text" name="name" placeholder="Name" required></p>
				 <p><span class="fa fa-envelope-o"></span><input type="text" name="user_email" placeholder="Email" required></p>
				 <p><span class="fa fa-lock"></span><input type="text" name="user_pass" placeholder="Password" required></p>
				 <p><span class="fa fa-lock"></span><input type="text" name="user_cpass" placeholder="Confirm password" required></p>
				 <p><span ><i class="fa fa-phone" aria-hidden="true"></i></span><input type="number" placeholder="mobile" required name="user_mob"></p> 
				 <p><input type="submit" value="submit" name="user_register_submit"></p>
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
<?php

mysql_close($db_handle);

?>	
</body>
</html>