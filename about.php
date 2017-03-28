
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
<link rel="stylesheet" type="text/css" href="css/about.css">
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

<div class="">
	<div class="container">
	<div class="jumbotron" style="background: #fff">
		<h1>Docket</h1>
		<span class="line"></span>
		<p>The application provides you with the service to manage your scheduled events/classes/meetings.
          The idea behind developing this application was to provide students with the tool to record the planned activities for the day/week/month and to get informed time to time about the next upcoming event as per the schedule. Also user can view the complete schedule of the day all at once. This also provides a platform for teachers and students to connect and communicate easily.</p>
	</div>
	<div class="row">
		<div class='team'>
			<h1>Our Team</h1>
			<span class="line"></span>
			<ul style="padding: 0;">
				<div class="row">
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/sj.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Sanyam Jain</p>
							<p class="team_title">Front end 	developer</p>
							<p class="team_description">the_???_one</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://www.facebook.com/sanyam.jain.796569"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="https://in.linkedin.com/in/sanyam-jain-736872113"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://plus.google.com/u/0/116166884275825343331"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>
				</li>
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/vasu.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Vasundhara Sharma</p>
							<p class="team_title">Project Manager</p>
							<p class="team_description">The_Managing_one</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://www.facebook.com/vasundhara.sharma.94"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="https://www.linkedin.com/in/vasundhara-s-abb32698"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://plus.google.com/u/1/109968321202051599803"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>
				</li>
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/pushpa.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Pushpendra Bansal</p>
							<p class="team_title">Full_stack_developer</p>
							<p class="team_description">The_Hardworking_one</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://www.facebook.com/pushpendra.bansal.98"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="https://in.linkedin.com/in/pushpendrabansal"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://plus.google.com/u/0/113093511089554092046"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>
				</li>
				</div>
				<div class="row">
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/rk.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Rishabh Kapoor</p>
							<p class="team_title">UI/UX Designer</p>
							<p class="team_description">The_Party_dude</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://www.facebook.com/rishabh.kapoor.100"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="www.linkedin.com/in/rishabh-kapoor"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://plus.google.com/u/1/100449615193697592212"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>
				</li>
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/kshitiz.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Kshitiz Gupta</p>
							<p class="team_title">Android Developer</p>
							<p class="team_description">The_Lazy_one</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://plus.google.com/u/0/103376014173165594125"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="
https://www.facebook.com/kshitiz.gupta.54943"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://www.linkedin.com/in/kshitiz-gupta-711a9380?trk=hp-identity-name"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>
				</li>
				<li class="col-md-4">
					<figure><img class="img-circle" src="images/team/sakshi.jpg" height="200px" width="200px" alt="">
						<figcaption>
							<p class="team_name">Sakshi Sharma</p>
							<p class="team_title">Android Developer</p>
							<p class="team_description">The_Critic_One</p>
						</figcaption>
					
					<ul class="team_link">
						<li><a href="https://www.facebook.com/profile.php?id=100001471027254"><img src="images/demo/fb.png" height="30px" width="30px" alt=""></a></li>
              			<li><a href="https://www.linkedin.com/in/sakshi-sharma-408313ab?trk=nav_responsive_tab_profile"><img src="images/demo/li.png" height="30px" width="30px" alt=""></a></li>
						<li><a href="https://plus.google.com/u/0/116051091963250869061"><img src="images/demo/th.jpg" height="30px" width="30px" alt=""></a></li>
              			
					</ul>
					</figure>	
				</li>
				</div>
			</ul>
		</div>	
	</div>
	</div>	
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