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
	
	<div class="groups user_list col-md-9">

<?php	
$msg = "";



if (isset($_POST['send'])) {
	$nem = $_POST['hid_nem'];
	$sub = $_POST['sub'];
	$mes = $_POST['mes'];
	
	if($nem == 'all'){
		$sql = "SELECT * FROM domain WHERE d_email = '$user'";
		$result = mysql_query($sql);
		while ($db_field = mysql_fetch_assoc($result)) {
			$a = $db_field['d_id'];
			$sql1 = "SELECT * FROM info WHERE domain = '$a'";
			$result1 = mysql_query($sql1);
			while ($db_field = mysql_fetch_assoc($result1)) {
			$b = $db_field['email'];
			$SQL3 = "INSERT INTO messaging (to_receiver, from_sender, mail_subject,message) VALUES ('$b', '$user', '$sub', '$mes')";
			$result3 = mysql_query($SQL3);
			if(!$result3 ){
				die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'domain_compose.php'</script>");
			}
			
			$SQL4 = "INSERT INTO sent_items (to_receiver, from_sender, mail_subject, message) VALUES ('$b', '$user', '$sub', '$mes')";
			$result4 = mysql_query($SQL4);
			if(!$result4 ){
				die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'messages.php'</script>");
			}
			
			
		}
	}
			$msg = "Message Sent.";	

}
else{
	$SQL = "INSERT INTO messaging (to_receiver, from_sender, mail_subject,message) VALUES ('$nem', '$user', '$sub', '$mes')";
	$result = mysql_query($SQL);
	if(!$result ){
		die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'domain_compose.php'</script>");
	}
	
	$SQL = "INSERT INTO sent_items (to_receiver, from_sender, mail_subject, message) VALUES ('$nem', '$user', '$sub', '$mes')";
	$result = mysql_query($SQL);
	if(!$result ){
		die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'messages.php'</script>");
	}
	
	$msg = "Message Sent.";
}	
}
?>

<div class='domain_form form-group' >
		
		<form  action="domain_compose.php" method="post" role="form" >
									
									<div class="form-group"> 
										<b><font face='Arial' size = '3'>To :</font></b>
									</div>
									<div class="form-group">
										<input type="text" name="hid_nem" tabindex="2" class="form-control" value="" >
									</div>
									<div class="form-group"> 
										<b><font face='Arial' size = '3'>Subject : </font></b>
									</div>
									<div class="form-group">
										<input type="text" name="sub" tabindex="2" class="form-control" value="">
									</div>
									<div class="form-group">
										<b><font face='Arial' size = '3'>Mail:</font></b>
									</div>	
									<div class="form-group">
										<input type="text" name="mes" tabindex="2" class="form-control" value="">
									</div>
									
									<div class="form-group">
										
										<div class="col-sm-3 ">
												
												<input type="submit" name="send"  tabindex="4" class="form-control  btn-register" value="Send">
											</div>
											<div class="col-sm-3 col-md-offset-1">
												
												<input type="submit" name="cancel"  tabindex="4" class="form-control  btn-register" value="cancel">
											</div>
										
										
									
									</div>
									<br>
									<div class="form-group col-md-12">
										<br><?php echo $msg ; ?>	
									</div>
										
		</form>
		<p>1. For sending mail to all of the domain member please type 'all' in the sender mail id</p>
	</div>
		
<?php

mysql_close($db_handle);

?>
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