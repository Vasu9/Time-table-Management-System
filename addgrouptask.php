<?php

include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}


if(isset($_POST['add_group_task'])){
	$gdate = $_POST['gdate'];
	$gtasknem = $_POST['gtasknem'];
	$ghour = $_POST['ghour'];
	$ggroup = $_POST['ggroup'];
	if($gdate==0000-00-00){
		$gdate=date('Y-m-d');
	}
	$sql = "SELECT * FROM groups WHERE group_id='$ggroup'"; 	
	$result = mysql_query($sql);
	while ($db_field=mysql_fetch_assoc($result)){
		$a = $db_field['user_email'];
		$sql2="INSERT INTO task(user,task,des,date)VALUES('$user','$gtasknem','$ghour','$gdate')";
		$result2=mysql_query($sql2);
	}
	print("<SCRIPT LANGUAGE='JavaScript'>alert('Added Sucessfully')</script><script>location.href = 'userhomepage.php'</script>");
}

mysql_close($db_handle);
?>