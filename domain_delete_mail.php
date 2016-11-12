<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: userlogin.php");
}

$ctrl = $_REQUEST['key'];


$SQL = "DELETE FROM messaging WHERE ctrl_no = '$ctrl'";
mysql_query($SQL);
mysql_close($db_handle);

print "<script>location.href = 'domain_inbox.php'</script>";
?>