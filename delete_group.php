<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
}

$groupkey = $_REQUEST['key'];


$SQL = "UPDATE info SET groups = '' WHERE group_id = '$groupkey'";
mysql_query($SQL);
	
$SQL = "DELETE FROM group_title WHERE group_id = '$groupkey'";
mysql_query($SQL);

mysql_close($db_handle);
print "<script>location.href = 'domain_view_group.php'</script>";
?>