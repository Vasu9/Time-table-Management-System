<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: userlogin.php");
}

$groupkey = $_REQUEST['key'];
$groupkey1 = $_REQUEST['id'];

if($user == $groupkey){
	die("<SCRIPT LANGUAGE='JavaScript'>alert('You can not delete yourself!')</script><script>location.href = 'edit_group.php?key=".$groupkey1."'</script>");
}
else{	

$SQL = "DELETE FROM groups WHERE group_id = '$groupkey1' AND user_email = '$groupkey'";
mysql_query($SQL);

mysql_close($db_handle);
print "<script>location.href = 'edit_group.php?key=".$groupkey1."'</script>";

}
?>