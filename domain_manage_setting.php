<?php
	include 'config.php';
	session_start();
	$user = $_SESSION['username'];
	$log = $_SESSION['admin'];
	if ($log != "log"){
		header ("Location: userlogin.php");
	}
	if (isset($_POST['domain_register'])) {
	$d_name = $_POST['d_name'];
	$d_mob = $_POST['d_mob'];
	$d_descr = $_POST['d_descr'];
	$d_address = $_POST['d_address'];
	$SQL1 = "UPDATE domain SET d_name ='$d_name',  d_mob='$d_mob' , d_descr='$d_descr' , d_address ='$d_address'  WHERE d_email='$user'";
	mysql_query($SQL1);
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
		
    	<div class="row ">
			<div class="col-md-9 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
<?php	
	$SQL = "SELECT * FROM domain WHERE d_email='$user' ";
	$result = mysql_query($SQL);
	while ($db_field = mysql_fetch_assoc($result)) {
		$a = $db_field['d_name'];
		$b = $db_field['d_pass'];
		$c = $db_field['d_email'];
		$d = $db_field['d_mob'];
		$e = $db_field['d_descr'];
		$f = $db_field['d_address'];
		$g = $db_field['d_id'];	
?>						
		<h2>
			ID :	<?php echo $g ; ?><br>
		 <?php echo $c ; ?><br>
		</h2>
					<form  action="domain_manage_setting.php" method="post" role="form" >
									
									
									<div class="form-group">
										<input type="text" name="d_name" tabindex="2" class="form-control" value="<?php echo $a ; ?>" >
									</div>
									
									<div class="form-group">
										<input type="text" name="d_mob" tabindex="2" class="form-control" value="<?php echo $d; ?>" >
									</div>
									<div class="form-group">
										<input type="text" name="d_address" tabindex="2" class="form-control" value="<?php echo $f ; ?>" >
									</div>
									<div class="form-group">
										<input type="text" name="d_descr" tabindex="2" class="form-control" value="<?php echo $e ; ?>">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<?php echo $msg ; ?>
												<input type="submit" name="domain_register"  tabindex="4" class="form-control  btn-register" value="UPDATE">
											</div>
										</div>
									</div>
								</form>


<?php } 
mysql_close($db_handle);	
?>





						
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	
	
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