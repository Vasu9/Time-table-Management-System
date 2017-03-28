<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}
$msg = "";
$date = date('y-m-d');
if (isset($_POST['group_join_submit'])) {
	$group_id = $_POST['group_id'];
	$SQL = "SELECT * FROM group_title";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['group_id'];
		if($group_id == $a){
			$sql2 = "INSERT INTO groups(group_id,user_email,doj,position) VALUES ('$group_id','$user','$date','member')";
			$result1 = mysql_query($sql2);
			if($result1){
				mysql_close($db_handle);
				header("Location: userhomepage.php");
				break;
				
			}
			else{
				echo "error";
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
	<link rel="stylesheet" type="text/css" href="css/domain_style.css">
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
					   Hello <?php 

$sql ="SELECT * FROM info WHERE email='$user'";
$result = mysql_query($sql);
while ($db_field = mysql_fetch_assoc($result)) {
	$name = $db_field['name'];
	print strtoupper($name);
}
?>
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    
					    <li><a href="user_setting.php">Settings</a></li>
					      <li class="divider"></li>
					    <li><a href="logout.php">Log Out</a></li>
					  </ul>
					</div>
			</div>
	</div>
</div>

<div class="main dash">
 <div class="container">
	<div class="col-md-2 grouplist">
			<div class="grouplist2">
					<h2>Messages</h2>
					<i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
					<a href="user_compose.php" class="addgroup " type="button"> Compose</a>
				<br>
					<i class="fa fa-envelope " aria-hidden="true"></i>
					<a href="user_inbox.php" class="addgroup " type="button"> Inbox(<?php
					  				$mess = 0;
					  				$count = 0;
					  				$sql = "SELECT * FROM messaging WHERE to_receiver = '$user' AND opened = 0";
					  				$result = mysql_query($sql);
					  				while ($db_field = mysql_fetch_assoc($result)) {
										$count = $count + 1;
									}
									mysql_close($db_handle);
										echo $count ;
								?>)</a>
				<br>
					<i class="fa fa-send " aria-hidden="true"></i>
					<a href="user_send.php" class="addgroup " type="button"> Send Mail</a>
				<br>
				<hr class="hr">	
			</div>	
			<div class="grouplist1">
				<h2>Groups</h2>
					<ul>
						<?php
							$SQL = "SELECT * FROM groups WHERE user_email='$user' ";
							$result = mysql_query($SQL);
								while ($db_field = mysql_fetch_assoc($result)) {
									$a = $db_field['group_id'];
									$c = $db_field['position'];
									if($c == 'admin'){
									$SQL = "SELECT * FROM group_title WHERE group_id='$a' ";
									$result1 = mysql_query($SQL);
										while ($db_field = mysql_fetch_assoc($result1)) {
												$b=$db_field['group_name'];
												echo '<li><a href="viewgroup1.php?key='.$a.'">'.$b.'</a><sup>Leader</sup></li>';
										}
									}
									else{
										$SQL = "SELECT * FROM group_title WHERE group_id='$a' ";
										$result1 = mysql_query($SQL);
										while ($db_field = mysql_fetch_assoc($result1)) {
												$b=$db_field['group_name'];
												echo '<li><a href="viewgroup1.php?key='.$a.'">'.$b.'</a></li>';
										}
									}	
								}					
						?>
					</ul>
				<hr class="hr">	
			</div>
			<div class="grouplist2">
				
					<a class="addgroup " type="button" href="group_join.php">Join Group</a><br>
					<a class="addgroup " type="button" href="group_create1.php">Create Group</a>
			</div>	
		<div class="clearfix"></div>
	</div>
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
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>

			</ul>		</div>
	
		</div>
	</div>
</body>
</html>