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
		<table border = "2"  width = "100%">
		<tr>
			<th></th>
			<td align = 'center'><b>From</b></td>
			<td><b>Subject</b></td>
			<td><b>Date</b></td>
			<td><b>Action</b></td>
		</tr>

				<?php
				include 'sql.php';

				$SQL = "SELECT * FROM messaging WHERE to_receiver = '$user' ORDER BY date_send DESC";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result)) {
					$ctrl = $db_field['ctrl_no'];
					$a = $db_field['opened'];
					$b = $db_field['from_sender'];
					$c = $db_field['mail_subject'];
					$d = $db_field['date_send'];
					print("<tr>");
					if($a == 0){
						print("<td align = 'center' width = '40'><a href = 'domain_read_mail.php?key=".$ctrl."'> <i class='fa fa-envelope' aria-hidden='true'></i></a></td>");
					}
					else{
						print("<tr><td align = 'center' width = '1'><a href = 'domain_read_mail.php?key=".$ctrl."'><i class='fa fa-envelope-o' aria-hidden='true'></i></a></td>");
					}
					print("<td align = 'center'><b>$b</b></td>");
					if($c == ""){
						print("<td align = 'center' width = '150'>no subject</td>");
					}
					else{
						print("<td align = 'center' width = '150'>$c</td>");
					}
					print("<td align = 'center'>$d</td>");
					print("<td align = 'center' width ='75'><a href = 'domain_reply_mail.php?key=".$b."'><i class='fa fa-reply' aria-hidden='true'></i> </a>");
					print("<a href = 'domain_delete_mail.php?key=".$ctrl."'> <i class='fa fa-trash' aria-hidden='true'></i></a></td>");
					print("</tr>");
				}
				?>


	</table>
</div>
</div></div>
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