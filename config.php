<?php    
    $host = "us-cdbr-iron-east-04.cleardb.net"; 
    $user = "b323e986dc71d7"; 
    $pass = "mnkupiddu"; 
    $db = "3cd9f19c"; 
    $p = mysql_connect($host, $user, $pass); 
    $db_found = mysql_select_db($db, $p);
if (!$db_found) {
	echo "DATABASE not found!";
}
 
?>
