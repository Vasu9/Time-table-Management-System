<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: userlogin.php");
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
<?php

if (isset($_POST['chage_upass'])) {

	$change_uppassword = $_POST['change_uppassword'];
	$change_unpassword = $_POST['change_unpassword'];
	$change_ucpassword = $_POST['change_ucpassword'];
	$SQL = "SELECT * FROM info WHERE email = '$user'";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a= $db_field['password'];
		if ($change_uppassword == $a){
			if($change_unpassword == $change_ucpassword){
				$SQL = "UPDATE info SET password  = '$change_unpassword' WHERE email = '$user'";
				mysql_query($SQL);
				mysql_close($db_handle);
				$msg = "Password change.";
			}
			else{
				$msg = "Password did not match.";
			}
		}
		else{
			$msg = "Current password error.";
		}
	}
}	
if (isset($_POST['change_pro'])) {

	$change_name = $_POST['change_name'];
	
	$change_mobile = $_POST['change_mobile'];
	$SQL = "SELECT * FROM info WHERE email = '$user'";
	$result = mysql_query($SQL);
	$SQL = "UPDATE info SET name  = '$change_name' ,mobile='$change_mobile' WHERE email = '$user'";
	mysql_query($SQL);
	mysql_close($db_handle);

}	
	$SQL = "SELECT * FROM info WHERE email = '$user'";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$b= $db_field['name'];
		$c= $db_field['doj'];
		$d= $db_field['mobile'];
	}	
?>




<div class="main">
<div class="container">
	
	<div class="col-md-12 domain_form">
		
    	<div class="row ">
    		<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-xs-12">
								<a href="#" id="register-form-link" class="active">Profile</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<form  id="register-form" action="domain_setting.php" method="post" style="display: block;">
									<div class="form-group">
										<input type="text" name="change_name"  tabindex="1" class="form-control" value="<?php echo $b;?>" >
									</div>	
									
									<div class="form-group">	
										<input type="text" name="change_mobile"  tabindex="1" class="form-control" value="<?php echo $d;?>" >
									</div>	
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<?php echo $msg ;?> 
												<input type="submit" name="change_pro" id="register-submit" tabindex="4" class="form-control  btn-register" value="update">
											</div>
										</div>
									</div>
							</form>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-xs-12">
								<a href="#" id="register-form-link" class="active">Edit Password</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<form  id="register-form" action="domain_setting.php" method="post" style="display: block;">
									<div class="form-group">
										<input type="password" name="change_uppassword" id="password" tabindex="1" class="form-control" placeholder="Previous Password" >
									</div>	
									<div class="form-group">
										<input type="password" name="change_unpassword" id="password" tabindex="1" class="form-control" placeholder="New Password" >
									</div>
									<div class="form-group">	
										<input type="password" name="change_ucpassword" id="password" tabindex="1" class="form-control" placeholder="Confirm New Password" >
									</div>	
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<?php echo $msg ;?> 
												<input type="submit" name="chage_upass" id="register-submit" tabindex="4" class="form-control  btn-register" value="Change Password">
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