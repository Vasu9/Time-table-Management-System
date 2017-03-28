
<?php
session_start();
session_destroy();
$msg = "";

include 'config.php';

if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	
	
	
		$SQL = "INSERT INTO contact(name,email,msg) VALUES ('$name','$email','$msg')";
		$result = mysql_query($SQL);
		
		if($result){
			print("<SCRIPT LANGUAGE='JavaScript'>alert('success!')</script><script>location.href = 'index.php'</script>");
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
	<link rel="stylesheet" type="text/css" href="css/contact.css">

<!-- bootstrap-->	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- icons-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- js scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

	<link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-social/ss-social.css" rel="stylesheet" />

	<link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-standard/ss-standard.css" rel="stylesheet" />
  
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  		
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
		<li><a data-toggle="modal" data-target="#myModal3" style="cursor:pointer">How to Use ?</a></li>
      </ul>

      <div id="myModal3" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">How to Use</h4>
							      </div>
							      <div class="modal-body">
							      	We have different domains under which there are several group and each group has a group head(who creates it) and its members.<br>
									We have four different type of users:<br>
									Admin<br>Domain head<br>Group head<br>Group members<br><br>

									<b>Note: LNMIIT Domain id:639333358</b><br><br>

									Here are the guidelines on how to use this website:<br>
									<b><br>As a Domain:<br></b>
									1. Login/signup to proceed or You can <b>create you own domain</b> from homepage and then proceed.<br>
									2. You may login as Domain head to view the activity flow of domain head.(sample credentials:   <br> username:bansalpunit96@gmail.com<br> password:qqq)<br>
									3. You can view all users.<br>
									4. You can update your account information.<br>
									
									<br><br><b>As a user:</b><br>
									1. You will be directed to user homepage where you can create your own group, join group by giving groupid as given by group heads.
									2. You can visit groups and see all the peer members.<br>
									3. You can send message to other users.<br>
									4. You can see the calendar with added events.<br>
									5. You can update user account information in settings section.<br>
									6. You can view recent notifications(will be covered in sprint3).<br>


							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
						</div>
    </div>
  </div>
</nav>

<div class="main" style="background: #fff;padding-top:80px">

<section id="hire" >     
  <div>
    <h1><b>Contact Us !</b></h1>
    

      <form action="contact.php" role='form' method="post">  
	      <div class="field name-box">
		        <input type="text" id="name" placeholder="Who Are You?" name="name" />
        		<label for="name">Name</label>
		        <span class="ss-icon">check</span>
	      </div>

	      <div class="field email-box">
		        <input type="text" id="email" placeholder="name@email.com" name="email" />
		        <label for="email">Email</label>
		        <span class="ss-icon">check</span>
	      </div>

	      <div class="field msg-box">
		        <textarea id="msg" rows="4" placeholder="Your message goes here..." name="msg" /></textarea>
		        <label for="msg">Msg</label>
		        <span class="ss-icon">check</span>
	      </div>

	      <input class="button" type="submit" value="Send" name="send" />
    </form></div>
</section>


</div>
<div class="footer">
		<div class="container">
		<div class="col-md-8 foot">
			<ul>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="domainregister.php">Domain</a></li>

			</ul>
		</div>
	
		</div>
</div>


</body>
</html>