<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
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

<div class="main dash">
<div class="container">
<div class="col-md-7">	
<?php
$namekey = $_REQUEST['key'];
$SQL = "SELECT * FROM group_title WHERE group_id = '$namekey'";
$result = mysql_query($SQL);
while ($db_field = mysql_fetch_assoc($result)) {
	$a = $db_field['group_name'];
	$b = $db_field['group_desc'];
	$c = $db_field['group_leader'];
	if($c == $user){
		mysql_close($db_handle);
		header("Location: edit_group.php");
		break;
	}
	else{
		echo '<b><h2>Group Name : '.$a.'</h2></b>';
 		echo  '<br>Group Description : '.$b.'<br><br>';
 		$sql1="SELECT * FROM groups WHERE group_id = '$namekey'";
 		$result1 = mysql_query($sql1);
 		echo '<table><tr><td><b>Member</b></td></tr>';
 		while ($db_field = mysql_fetch_assoc($result1)) {
 			$d = $db_field['user_email'];
 			echo '<tr><td>'.$d.'<br></td></tr></table>';

 		}
	}	
}
mysql_close($db_handle);
?>
</div>
<div class="col-md-5">
	<h2><a href="user_compose.php" class="addgroup1 " type="button" style="border:2px solid #000"> Send Request</a></h2>
</div>
</div>
</div>	
	<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>

			</ul>
		</div>
	
		
		</div>
	</div>
</body>
</html>