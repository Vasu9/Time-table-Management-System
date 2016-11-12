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
			
				<div class="col-md-12 user_cal ">
					<div class="col-md-11 hr">
						<div class="col-md-2 left">
							<a href="#"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
						</div>
						<div class="col-md-4 middle">
							<a data-toggle="modal" data-target="#myModal1"><p>05/10/2016</p></a>
						</div>
						<div class="col-md-2 right">
							<a href="#"><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>
						</div>
						<div class="col-md-4 right padd">
							
							<a  data-toggle="modal" data-target="#myModal1">
									<i class="fa fa-calendar fa-2x" aria-hidden="true"></i></a>
							<a data-toggle="modal" data-target="#myModal3"><i class="fa fa-cog fa-2x" aria-hidden="true"></i>	</a>	
							
						<div id="myModal1" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Add Group</h4>
							      </div>
							      <div class="modal-body">
							      
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
						</div>
						<div id="myModal3" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title center">Setting</h4>
							      </div>
							      <div class="modal-body">
							      	
							      	<div class="user_setting" >
								      	<div class="left col-md-9">
								      		<h2>Notification</h2>
								      	</div>	
								      	<div class="switch col-md-3">
		
											<input type="checkbox" class="check" id="x"></input>
											<label class="lab" for="x"></label>
										
										</div>
									</div>


							      </div>
							     
							    </div>

							  </div>
						</div>
						</div>	
					</div>
					<div class="col-md-1"></div>	
				</div>	
				<div class="col-md-12 user_task">

					<div id="table" class="table-editable">
					    
					    <table class="table">
					      <tr>
					        <th>Task</th>
					        <th>Time</th>
					        <th><span class="table-add fa-plus fa fa-2x"></span></th>
					        
					      </tr>
					      <tr>
					        <td contenteditable="true">task 1 </td>
					        <td contenteditable="true">3 PM - 4 PM</td>
					        <td>
					          <span class="table-remove glyphicon fa-remove fa"></span>
					        </td>
					      </tr>
					      <!-- This is our clonable table line -->
					      <tr class="hide">
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">undefined</td>
					        <td>
					          <span class="table-remove glyphicon fa-remove fa"></span>
					        </td>
					       
					      </tr>
					    </table>

  					</div>
									<script type="text/javascript">
										var $TABLE = $('#table');
											var $BTN = $('#export-btn');
											var $EXPORT = $('#export');

											$('.table-add').click(function () {
											  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
											  $TABLE.find('table').append($clone);
											});

											$('.table-remove').click(function () {
											  $(this).parents('tr').detach();
											});

											$('.table-up').click(function () {
											  var $row = $(this).parents('tr');
											  if ($row.index() === 1) return; // Don't go above the header
											  $row.prev().before($row.get(0));
											});

											$('.table-down').click(function () {
											  var $row = $(this).parents('tr');
											  $row.next().after($row.get(0));
											});

											// A few jQuery helpers for exporting only
											jQuery.fn.pop = [].pop;
											jQuery.fn.shift = [].shift;

											$BTN.click(function () {
											  var $rows = $TABLE.find('tr:not(:hidden)');
											  var headers = [];
											  var data = [];
											  
											  // Get the headers (add special header logic here)
											  $($rows.shift()).find('th:not(:empty)').each(function () {
											    headers.push($(this).text().toLowerCase());
											  });
											  
											  // Turn all existing rows into a loopable array
											  $rows.each(function () {
											    var $td = $(this).find('td');
											    var h = {};
											    
											    // Use the headers from earlier to name our hash keys
											    headers.forEach(function (header, i) {
											      h[header] = $td.eq(i).text();   
											    });
											    
											    data.push(h);
											  });
											  
											  // Output the result
											  $EXPORT.text(JSON.stringify(data));
												});
									</script>

				</div>

		</div>
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