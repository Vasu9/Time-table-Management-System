<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
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

	<div class="col-md-3 domainbar" >
		<i class="fa fa-plus " aria-hidden="true"></i>
		<a href="group_create.php" style="color:#fff"> Create Group</a>
	<br>
		<i class="fa fa-eye" aria-hidden="true"></i>
		<a href="domain_view_group.php" style="color:#fff">View Group</a>
	<br>
		<i class="fa fa-steam" aria-hidden="true"></i>
		<a href="domain_manage_user.php" style="color:#fff">Manage User</a>		
	<br>
		<i class="fa fa-cog" aria-hidden="true"></i>
		<a href="domain_manage_setting.php" style="color:#fff">Domain Settings</a>
	</div>	
	
	<div class="groups user_list col-md-9">
		<table border = "2" width = "100%">
			<tr class="bold">
				<td align = 'center'>Group</td>
				<td align = 'center'>Leader</td>
				<td align = 'center'>Member/s</td>
				<td align = 'center'>Action</td>
			</tr>
				<?php
				$SQ="SELECT * FROM domain WHERE d_email = '$user'";
				$res = mysql_query($SQ);
				while ($db_field = mysql_fetch_assoc($res)){
				$d = $db_field['d_id'];
				$SQL = "SELECT * FROM group_title WHERE group_domain='$d'";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result)) {
				$a = $db_field['group_name'];
				$b = $db_field['group_leader'];
				$e = $db_field['group_id'];
				print("<tr><td align = 'center'><b><a href='viewgroup.php?key=".$e."'>".$a."</b></td>");
				if($b == ""){
					print("<td align = 'center'><b>no leader</font></b></td>");	
				}
				else{
					print("<td align = 'center'><a href='viewuser.php?key=".$b."'>".$b."</td>");
				}
				print("<td align = 'center'>");
				$SQL1 = "SELECT * FROM groups WHERE group_id = '$e'";
				$result1 = mysql_query($SQL1);
				while ($db_field = mysql_fetch_assoc($result1)) {
					$c = $db_field['user_email'];
					print ("<a href='viewuser.php?key=".$c."'>".$c.", ");
				}
				print("</td>");
				print("<td width = '70px' align = 'center'><a href = 'delete_group.php?key=".$e."'><i class='fa fa-trash'></i> </a>");
				print("<a href = 'edit_group.php?key=".$a."'> <i class='fa fa-edit'></i></a>");
				}}
				mysql_close($db_handle);
				?>
		</table>
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