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
<div class="">
 <div class="main1" style="min-height:550px">

<div class="container user-content">
			<div class="row">
				<div class="Action">
<?php
$namekey = $_REQUEST['key'];

$sql2="SELECT * FROM groups WHERE group_id = '$namekey' and user_email ='$user'";
$result2 = mysql_query($sql2);
while ($db_field = mysql_fetch_assoc($result2)) {
	$i = $db_field['position'];
	if($i=='admin'){
		mysql_close($db_handle);
		print("<script>location.href = 'edit_group1.php?key=".$namekey."'</script>");
		break;
	}
}	


$SQL = "SELECT * FROM group_title WHERE group_id = '$namekey'";
$result = mysql_query($SQL);
while ($db_field = mysql_fetch_assoc($result)) {
	$a = $db_field['group_name'];
	$b = $db_field['group_desc'];
	$e = $db_field['group_create'];
	$h = $db_field['group_id'];

	echo '<b><h2>'.$a.'</h2></b>';
	
	echo  '<a href="leavegroup.php?key='.$h.'" class="btn btn-warning right">Leave Group</a>';
	

	echo  '</div><div class="description"><p>'.$b.'</p></div>';
	echo  '<div class="created-on-wrapper center">Created On : '.$e.'</div><br>';
	

	$sql1="SELECT * FROM groups WHERE group_id = '$namekey' order by position";
	$result1 = mysql_query($sql1);
	echo '<table><tr><td><b>Member</b></td>';
	echo '<td><b>Position</b></td>';
	echo '<td><b>Date of Joining</b></td></tr>';
	while ($db_field = mysql_fetch_assoc($result1)) {
		$d = $db_field['user_email'];
		$f = $db_field['position'];
		$g = $db_field['doj'];
		echo '<tr>';
		echo '<td>'.$d.'</td>';
		echo '<td>'.$f.'</td>';
		echo '<td>'.$g.'</td>';
		echo '</tr>';
		

 		
	}	
	echo '</table>';
}
mysql_close($db_handle);
?>


</div>

					
				
			
			</div>
		</div>
	</div>
</div>	
	

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