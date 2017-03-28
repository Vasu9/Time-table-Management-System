<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
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
					 
					  <ul class="dropdown-menu">
						    <li><a href="#">HTML</a></li>
						    <li class="divider"></li>
						    <li><a href="#">CSS</a></li>
						    <li class="divider"></li>
						    <li><a href="#">JavaScript</a></li>
						    <li class="divider"></li>
						   	<li><a href="#" class="notiexec">See more</a></li> 
					  </ul>
				</div>
			
				<div class="dropdown inline">
					  <button class="notibutton dropdown-toggle" type="button" data-toggle="dropdown">
					  <i class="fa fa-user fa-2x" aria-hidden="true"></i>
					   Hello <?php print strtoupper($user); ?>
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
					<a href="user_inbox.php" class="addgroup " type="button"> Inbox

					<?php
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
								</a>
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

	<div class="groups user_list col-md-9">

<?php	
$msg = "";
$ne = $_REQUEST['key'];

if (isset($_POST['send'])) {
	$user = $_SESSION['username'];
	$sub = $_POST['sub'];
	$mes = $_POST['mes'];
	$nem = $_POST['hid_nem'];

	$sql4 = "SELECT * FROM groups WHERE group_id='$nem'";
	$result4 = mysql_query($sql4);
	while($db_field=mysql_fetch_assoc($result4)){
	$a = $db_field['user_email'];

	$SQL = "INSERT INTO messaging (to_receiver, from_sender, mail_subject,message) VALUES ('$a', '$user', '$sub', '$mes')";
	$result = mysql_query($SQL);
	if(!$result ){
		die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'userhome.php'</script>");
	}
	
	$SQL = "INSERT INTO sent_items (to_receiver, from_sender, mail_subject, message) VALUES ('$a', '$user', '$sub', '$mes')";
	$result = mysql_query($SQL);
	if(!$result ){
		die("<SCRIPT LANGUAGE='JavaScript'>alert('Unknown Error Occured!')</script><script>location.href = 'userhome.php'</script>");
	}

}	
	$msg = "Message Sent.";

}
?>

<div class='domain_form form-group' style="color: #000">
		
		<form  action="msg_group.php" method="post" role="form" >
									
									<div class="form-group"> 
										<b><font face='Arial' size = '3'>To :</font></b>
									</div>
									<div class="form-group">
										<input type="text" name="hid_nem" tabindex="2" class="form-control" value="<?php echo $ne ; ?>" >
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