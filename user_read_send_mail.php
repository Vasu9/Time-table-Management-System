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

	<title>homepage</title>
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
	<link rel="stylesheet" type="text/css" href="css/task.css">
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
					  <button class="notibutton  dropdown-toggle" type="button" data-toggle="dropdown">
					  	<me class="fa fa-bell fa-2x" aria-hidden="true">
					  		<sup>
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
					  		</sup>
					  	</me>
					  </button>
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
					<a href="user_inbox.php" class="addgroup " type="button"> Inbox</a>
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
									$SQL = "SELECT * FROM group_title WHERE group_id='$a' ";
									$result1 = mysql_query($SQL);
										while ($db_field = mysql_fetch_assoc($result1)) {
												$b=$db_field['group_name'];
												echo '<li><a href="viewgroup.php?key='.$a.'">'.$b.'</a></li>';
									}	
								}					
						?>
					</ul>
				<hr class="hr">	
			</div>
			<div class="grouplist2">
				
					<a class="addgroup " type="button" href="group_join.php">Join Group</a><br>
					<a class="addgroup " type="button" href="group_create.php">Create Group</a>
			</div>	
		<div class="clearfix"></div>
	</div>
	<div class="col-md-10 dashboard"> 
		
		<?php
			$ctrl = $_REQUEST['key'];
			include 'sql.php';

			$SQL = "UPDATE sent_items SET opened = 1 WHERE ctrl_no = '$ctrl'";
			mysql_query($SQL);


			$SQL = "SELECT * FROM sent_items WHERE ctrl_no = '$ctrl'";
			$result = mysql_query($SQL);
			while ($db_field = mysql_fetch_assoc($result)) {
				$to = $db_field['to_receiver'];
				$date = $db_field['date_send'];
				$sub = $db_field['mail_subject'];
				$mess = $db_field['message'];
			}
		?>

		<table  style="border:0px" width="100%">
				<tr><b><font face="Arial" size = "5">
					<td style="border:0px">to</td>
					<td style="border:0px"> <?php print $to; ?></td></font></b>
				</tr>
				<tr><b><font face="Arial" size = "3">
					<td style="border:0px">Date:</td>
					<td style="border:0px"><?php print $date; ?></td></font></b>
				</tr>	
				<tr><b><font face="Arial" size = "3">
					<td style="border:0px">Subject:</td>
					<td style="border:0px"><?php print $sub; ?></td></font></b>
				</tr>
				<tr>
					<td style="border:0px"></td>
					<td style="border:0px"><?php print $mess; ?></td>
				</tr>
		</table>





	</div>
</div></div>
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