<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}
$namekey = $_REQUEST['key'];
if (isset($_POST['group_update'])) {
	$g_name = $_POST['g_name'];
	$g_descr = $_POST['g_descr'];
	$g_create = $_POST['g_create'];
	$SQL10 = "UPDATE group_title SET group_name ='$g_name', group_desc='$g_descr' , group_create ='$g_create'  WHERE group_id='$namekey'";
	mysql_query($SQL10);
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
		<div class="col-md-9 col-md-offset-1">	
		<div class="main1">

		
		
			<?php
				
				$SQL = "SELECT * FROM group_title WHERE group_id = '$namekey'";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result)) {
					$a = $db_field['group_name'];
					$b = $db_field['group_desc'];
					$e = $db_field['group_create'];
					$h = $db_field['group_id'];
				
					
				

			?>
			<br><div class="description"><p>Group ID : <?php echo $h ; ?>
				<a href="remove_group1.php?key=<?php echo $h  ; ?>" class="btn btn-warning right">delete</a>
				<a href="msg_group.php?key=<?php echo $h  ; ?>" class="btn btn-warning right">message</a>
				<a href="add_group_task.php?key=<?php echo $h  ; ?>" class="btn btn-warning right">Add Task</a></p></div>
			<form action="" method="post" role="form" >
				

				
				<div class="form-group">
					<input type="text" name="g_name" tabindex="2" class="form-control" value="<?php echo $a; ?>" >
				</div>
				
				<div class="form-group">
					<input type="text" name="g_create" tabindex="2" class="form-control" value="<?php echo $e; ?>" >
				</div>
				<div class="form-group">
					<input type="text" name="g_descr" tabindex="2" class="form-control" value="<?php echo $b; ?>">
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							
							<input type="submit" name="group_update"  tabindex="4" class="form-control  btn-register" value="UPDATE">
						</div>
					</div>
				</div>
			</form>
<?php 
}


?>



			<table style="background: #fff;font-weight: bolder;">
				<tr>
					<td>email id</td>
					<td>position</td>
					<td>date join</td>
					<td>Delete from group</td>
					<td></td>
				</tr>
<?php
$sql1="SELECT * FROM groups WHERE group_id = '$namekey'";
$result1 = mysql_query($sql1);
	while ($db_field = mysql_fetch_assoc($result1)) {
		$d = $db_field['user_email'];
		$f = $db_field['position'];
		$g = $db_field['doj'];
?>						
				<tr>
					<td><?php echo $d; ?></td>
					<td><?php echo $f; ?></td>
					<td><?php echo $g; ?></td>
					<td><a href="removeuser1.php?key=<?php echo $d; ?>&id=<?php echo $h; ?>" class="btn btn-warning">delete</a></td>
					<td><?php echo '<a href="msg_user.php?key='.$d.'" class="btn btn-warning">message</a>' ;?></td>
				</tr>
<?php }
mysql_close($db_handle);	
?>


			</table>
			</div>
</div>
</div>	</div></div></div></div>

<div class="footer">
		<div class="container">
		<div class="col-md-12 foot">
			<ul>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>

			</ul>
</div>
	
		
		</div>
	</div>
</body>
</html>