<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: login.php");
}
$msg = "";
if (isset($_POST['group_join_submit'])) {
	$group_id = $_POST['group_id'];
	$SQL = "SELECT * FROM group_title";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['group_id'];
		if($group_id == $a){
			$SQL = "INSERT INTO groups (group_id,user_email,position) VALUES ('$group_id','$user','member')";
			$result1 = mysql_query($SQL);
			if($result1){
				mysql_close($db_handle);
				header("Location: userhomepage.php");
				break;
				
			}
			else{
				mysql_close($db_handle);
				header("Location: userhomepage.php");
				break;
			}
		}
	}

	$msg = "Check Group id.";
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




<div class="main">
<div class="container">
	
	<div class="user_login col-md-6 col-md-offset-4" id="login">
			<h2>Join Group</h2>

			<form method='post'  name='user_register' action='group_join.php'>
				 <p><span class="fa fa-users"></span><input type="text" name="group_id" placeholder="Group Id" required></p>
				
				 <p><input type="submit" value="submit" name="group_join_submit"></p>
			</form>

			<p><?php print $msg; ?></p>
			
			
			
		
			
	
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