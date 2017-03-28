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

  		<link rel="stylesheet" type="text/css" href="css/viewgroup.css">
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


			<div class="row">
				<div class="">
			
<?php
$namekey = $_REQUEST['key'];
$SQL = "SELECT * FROM info WHERE email = '$namekey'";
$result = mysql_query($SQL);

while ($db_field = mysql_fetch_assoc($result)) {
	$a = $db_field['email'];
	$k = $db_field['name'];
	$b = $db_field['mobile'];
	$c = $db_field['doj'];
?>
	
<div class="description"><p><h2><?php echo $k ; ?>
				<a href="delete.php?key=<?php echo $a ; ?>" class="btn btn-warning right">delete</a>
				<a href="domain_message.php?key=<?php echo $a ; ?>" class="btn btn-warning right">message</a></p><?php echo $a; ?></h2>
				Mobile : <?php echo $b ;?><br>
				Date Of Joining : <?php echo $c ;?>
</div>
<?php
	}
?>

	<table style="background: #fff;font-weight: bolder;">
	
		<tr>
			<td style="padding: 10px 10px">Groups</td>
			
			<td style="padding: 10px 10px">Position</td>
			<td style="padding: 10px 10px">Date of joining</td>
		</tr>
<?php 
$SQL = "SELECT * FROM groups WHERE user_email = '$namekey'";
$result = mysql_query($SQL);
while ($db_field = mysql_fetch_assoc($result)) {
	$a = $db_field['doj'];
	$b = $db_field['group_id'];
	$d = $db_field['position'];
	$SQL1 = "SELECT * FROM group_title WHERE group_id = '$b'";
	$result1 = mysql_query($SQL1);
	while ($db_field = mysql_fetch_assoc($result1)) {
		$c = $db_field['group_name'];
		echo '<tr>';
		echo '<td><a href="viewgroup.php?key='.$b.'" style="color:#000">'.$c.'</a></td>';
		echo '<td>'.$d.'</td>';
		echo '<td>'.$a.'</td>';
		echo '</tr>';

}}
?>
	</table>

	</div>
</div>
</div>	

<?php

mysql_close($db_handle);

?>
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
