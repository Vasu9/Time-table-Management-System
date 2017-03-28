<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: userlogin.php");
}

$groupkey = $_REQUEST['key'];



$SQL = "DELETE FROM group_title WHERE group_id = '$groupkey'";
mysql_query($SQL);

$SQL1 = "DELETE FROM groups WHERE group_id= '$groupkey' ";
mysql_query($SQL1);


mysql_close($db_handle);
print "<script>location.href = 'userhomepage.php'</script>";
?>