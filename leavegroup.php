<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}

$namekey = $_REQUEST['key'];


$SQL = "DELETE FROM groups WHERE group_id = '$namekey' and user_email='$user'";
$result = mysql_query($SQL);
if($result){


mysql_close($db_handle);
print "<script>location.href = 'userhomepage.php'</script>";
}
?>