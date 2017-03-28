<?php

include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}
if (isset($_POST['add'])) {
	$a = $_POST['tasknem'];
	$b = $_POST['hour'];
	$c = $_POST['date']; 
	if($c==0000-00-00){
		$c=date('Y-m-d');
	}
		$s = "INSERT INTO task(date,des,task,user ) VALUES( '$c','$a','$b','$user')";
		$r = mysql_query($s);
	$msg = "added suceesfully";					
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

  	<script>
  $( function() {
    $( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
		$("#date_pick").click(function(){ 
				$("#datepicker").datepicker("show");
		});
  } );
  </script>
  <style>
		ul > li 
	  {
		list-style:none;
		text-decoration:none;
	  }
	</style>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy"
    });
  } );
  </script>	
  <script
  >
  $( function() {
    $( "#datepicker1" ).datepicker();
		$( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd");
		$("#date_pick1").click(function(){ 
				$("#datepicker1").datepicker("show");
		});
  } );
  </script>
  <script>
  $( function() {
    $( "#date" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy"
    });
  } );
  </script>	
    <script
  >
  $( function() {
    $( "#datepicker2" ).datepicker();
		$( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd");
		$("#date_pick2").click(function(){ 
				$("#datepicker1").datepicker("show");
		});
  } );
  </script>
  <script>
  $( function() {
    $( "#date" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy"
    });
  } );
  </script>	
 
	 <link rel="stylesheet" href="jquery-ui.css">
	 <script src="jquery.js"></script>
  <script src="jquery-ui.js"></script>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




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

	<div class="col-md-10 dashboard"> 
	  
		<div class="col-md-12 user_cal ">
		  <div class="col-md-6">
			<h2 class="center">today's task</h2>
				<table>
					<tr>
						<td width="100px"><b>Task</b></td>

						<td ><b>Time</b></td>
						<td width="20px"></td>
						<td width="20px"></td></tr>
					
						<?php
						$date = date('Y-m-d');
						$sql = "SELECT * FROM task WHERE user='$user' and date='$date' ORDER BY task DESC";
						$result = mysql_query($sql);
						while ($db_field=mysql_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td>'.$db_field['task'].'</td>';
							echo '<td>'.$db_field['des'].'</td>';
							echo '</tr>'; 
						}
						?>	
				</table>
		 </div>
		 <div class="col-md-6"> 
		 	<h2 class="center">tomorrow's task</h2>
		 	<table>
					<tr>
						<td width="100px"><b>Task</b></td>
						<td width="100px"><b>Time</b></td>
					</tr>
					
						<?php
						$date = date('Y-m-d');
						$date1 = date('Y-m-d', strtotime('+1 day', strtotime($date)));
						$sql = "SELECT * FROM task WHERE user='$user' and date='$date1' ORDER BY task DESC";
						$result = mysql_query($sql);
						while ($db_field=mysql_fetch_assoc($result)) {
							echo '<tr>';
							echo '<td>'.$db_field['task'].'</td>';
							echo '<td>'.$db_field['des'].'</td>';
							echo '</tr>'; 
						}
						?>	
				</table>
		 </div>
		 
		<div class="clearfix"></div><br>
		<div class="hr"></div>
		<div class="col-md-12 hr">
			<h2 class="left">Add Task</h2>
			
				
		<div class="col-md-12">
					<form method='post' action='userhomepage.php' name="form1" > 
						
						<input type="text" id="datepicker" class="date" name="date"	placeholder="<?php echo date('Y-m-d') ;?>" style="padding:4px 10px 4px 10px">
					    <input name = 'tasknem' type = 'text' required="" placeholder="Task" style="padding:4px 10px 4px 10px">
			     
			        	<select name="hour" class="btn btn-success" required>
						    <option value="">Choose time</option>
						    <option value="12 - 01 AM">12 - 01 AM</option>
						    <option value="01 - 02 AM">01 - 02 AM</option>
						    <option value="02 - 03 AM">02 - 03 AM</option>
						    <option value="03 - 04 AM">03 - 04 AM</option>
						    <option value="04 - 05 AM">04 - 05 AM</option>
						    <option value="05 - 06 AM">05 - 06 AM</option>
						    <option value="06 - 07 AM">06 - 07 AM</option>
						    <option value="07 - 08 AM">07 - 08 AM</option>
						    <option value="08 - 09 AM">08 - 09 AM</option>
						    <option value="09 - 10 AM">09 - 10 AM</option>
						    <option value="10 - 11 AM">10 - 11 AM</option>
						    <option value="11 - 12 PM">11 - 12 PM</option>
						    <option value="12 - 01 PM">12 - 01 PM</option>
						    <option value="01 - 02 PM">01 - 02 PM</option>
						    <option value="02 - 03 PM">02 - 03 PM</option>
						    <option value="03 - 04 PM">03 - 04 PM</option>
						    <option value="04 - 05 PM">04 - 05 PM</option>
						    <option value="05 - 06 PM">05 - 06 PM</option>
						    <option value="06 - 07 PM">06 - 07 PM</option>
						    <option value="07 - 08 PM">07 - 08 PM</option>
						    <option value="08 - 09 PM">08 - 09 PM</option>
						    <option value="09 - 10 PM">09 - 10 PM</option>
						    <option value="10 - 11 PM">10 - 11 PM</option>
						    <option value="11 - 12 AM">11 - 12 AM</option>
				  		</select>
				  	<input type="submit" name="add" style="padding:4px 20px 4px 20px" value="Add">
				  	
			</form> 

			<br>
			<?php echo $msg ; ?>
			<br>
		</div>

	</div><div class="clearfix"></div>

	<div class="col-md-12 hr">
		<h2>View All Task</h2>		
		<form action="userhomepage.php" method="post" name="form2" role="form">
		
			<input type="text" name="id" id="datepicker1" placeholder="<?php echo date('Y-m-d') ;?>" style="padding:4px 10px 4px 10px">
			<input type="submit" name="view" style="padding:4px 20px 4px 20px">
		</form>	
	
		<?php 
			if(isset($_POST['view'])){
				$id = $_POST['id'];
		
				$S = "SELECT * FROM task WHERE user='$user' and date='$id'";
				$R=mysql_query($S);
				while($res=mysql_fetch_assoc($R)){
					$p=$res['task'];
					$q=$res['des'];
					echo '<table>';
					echo '<tr><td>'.$p.'</td>';
					echo '<td>'.$q.'</td></table>';
				}
			}
			mysql_close($db_handle);
			 
   


		?><br>
	</div>
	<div class="col-md-12">
		<h2>Add Group Task</h2>		
		<form action="addgrouptask.php" method="post" name="form2" role="form">
		
			<input type="text" name="gdate" id="datepicker2" placeholder="<?php echo date('Y-m-d') ;?>" style="padding:4px 10px 4px 10px">
			<input name = 'gtasknem' type = 'text' required="" placeholder="Task" style="padding:4px 10px 4px 10px">
			     
			<select name="ghour" class="btn btn-success" required>
						    <option value="">Choose time</option>
						    <option value="12 - 01 AM">12 - 01 AM</option>
						    <option value="01 - 02 AM">01 - 02 AM</option>
						    <option value="02 - 03 AM">02 - 03 AM</option>
						    <option value="03 - 04 AM">03 - 04 AM</option>
						    <option value="04 - 05 AM">04 - 05 AM</option>
						    <option value="05 - 06 AM">05 - 06 AM</option>
						    <option value="06 - 07 AM">06 - 07 AM</option>
						    <option value="07 - 08 AM">07 - 08 AM</option>
						    <option value="08 - 09 AM">08 - 09 AM</option>
						    <option value="09 - 10 AM">09 - 10 AM</option>
						    <option value="10 - 11 AM">10 - 11 AM</option>
						    <option value="11 - 12 PM">11 - 12 PM</option>
						    <option value="12 - 01 PM">12 - 01 PM</option>
						    <option value="01 - 02 PM">01 - 02 PM</option>
						    <option value="02 - 03 PM">02 - 03 PM</option>
						    <option value="03 - 04 PM">03 - 04 PM</option>
						    <option value="04 - 05 PM">04 - 05 PM</option>
						    <option value="05 - 06 PM">05 - 06 PM</option>
						    <option value="06 - 07 PM">06 - 07 PM</option>
						    <option value="07 - 08 PM">07 - 08 PM</option>
						    <option value="08 - 09 PM">08 - 09 PM</option>
						    <option value="09 - 10 PM">09 - 10 PM</option>
						    <option value="10 - 11 PM">10 - 11 PM</option>
						    <option value="11 - 12 AM">11 - 12 AM</option>
			</select>

			<?php
				print("<select name = 'ggroup' class='btn btn-success'>");
				print("<option value=''>Choose hostel</option>");
				$SQL = "SELECT * FROM group_title WHERE group_leader='$user' ORDER BY group_name ASC";
				$result = mysql_query($SQL);
				while ($db_field = mysql_fetch_assoc($result)){
					$list = $db_field['group_name'];
					$id = $db_field['group_id'];
					print("<option value='".$id."'>$list");
				}
				mysql_close($db_handle);
				
				print("</select>");
				
			?>

			<input type="submit" name="add_group_task" style="padding:4px 20px 4px 20px" value="Add Group Task">
			
		</form>	
	
	<br><br><br>
	</div>


</div>
</div>

<div class="clearfix"></div>

</div>
</div>
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