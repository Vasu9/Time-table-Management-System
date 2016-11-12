<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$msg = "";
if (isset($_POST['group_create_submit'])) {
	$group_name = $_POST['group_name'];
	$group_desc = $_POST['group_desc'];
	$domain_id = $_POST['domain_id'];
	$group_id = rand() % 9999;
	$SQL = "INSERT INTO group_title (group_name,group_desc,group_domain,group_leader,group_id) VALUES ('$group_name','$group_desc','$domain_id','$user','$group_id')";
		$result = mysql_query($SQL);
		if($result){
			mysql_close($db_handle);
			$msg = 'Group succesfully added.';
		}
		else{
			mysql_close($db_handle);
			$msg = "Error adding group";
		}
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
	
	<div class="user_login col-md-6 col-md-offset-4" id="login">
			<h2>Create Group</h2>

			<form method='post'  name='user_register' action='group_create.php'>
				 <p><span class="fa fa-users"></span><input type="text" name="group_name" placeholder="Group Name" required></p>
				 <p><span class="fa fa-ellipsis-h"></span><input type="text" name="group_desc" placeholder="Group Description" required></p>
				 <p><span ><i class="fa fa-university" aria-hidden="true"></i></span><input type="text" placeholder="Domain ID" required name="domain_id"></p> 
				 <p><input type="submit" value="submit" name="group_create_submit"></p>
			</form>

			<p><?php print $msg; ?></p>
		
			
	
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