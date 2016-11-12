<?php


session_start();
if($_SESSION['admin']){
	mysql_close($db_handle);
	header("Location:domainhome.php");
	break;
}
else if($_SESSION['member']){
	mysql_close($db_handle);
	header ("Location: userhomepage.php");
	break;
}

else{

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
    <div class="collapse navbar-collapse menu" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="userlogin.php">Log In</a></li>
		<li><a href="usersignup.php">Sign Up</a></li>
		<li><a href="usersignup.php">How to Use</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="main">
	<div class="main1">
		<div class="container">
			<div class="col-md-10">
				<h2>The application provides you with the service to manage your scheduled events, classes, meetings.</h2>
					<p>The idea behind developing this application was to provide students with the tool to record the planned activities for the day/week/month and to get informed time to time about the next upcoming event as per the schedule. Also user can view the complete schedule of the day all at once. This also provides a platform for teachers and students to connect and communicate easily.
					<br>
					The application provides you with the service to manage your scheduled events/classes/meetings.<br>
					The idea behind developing this application was to provide students with the tool to record the planned activities for the day/week/month and to get informed time to time about the next upcoming event as per the schedule. Also user can view the complete schedule of the day all at once. This also provides a platform for teachers and students to connect and communicate easily.</p>
					<h2 class="middle">Team</h2>
					<div class="col-md-12">	
						<div class="col-md-4"><h2>Sanyam Jain</h2>sanyamjain838@gmail.com</div>
						<div class="col-md-4"><h2>Vasundhara Sharma</h2>y14uc330@lnmiit.ac.in</div>
						<div class="col-md-4"><h2>Sakshi Sharma</h2>sakshi84raj@gmail.com</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-4"><h2>Pushpendra Bansal</h2>bansalpunitib@gmail.com</div>
						<div class="col-md-4"><h2>Kshitiz Gupta</h2>kshitiz7gupta@gmail.com</div>
						<div class="col-md-4"><h2>Rishabh Kapoor</h2>rkapoor414@gmail.com</div> 
						
					</div>
					
					
	
				
			</div>
			
		</div>
	</div>
</div>	


<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="about.html">About Us</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="domainregister.php">Domain</a></li>

			</ul>
		</div>
	
		
		</div>
</div>


</body>
</html>