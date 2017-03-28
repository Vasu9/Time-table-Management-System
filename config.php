<?php    
    $host = "localhost"; 
    $user = "root"; 
    $pass = "mnkupiddu"; 
    $db = "swe"; 
    $p = mysql_connect($host, $user, $pass); 
    $db_found = mysql_select_db($db, $p);
if (!$db_found) {
	echo "DATABASE not found!";
}
 
?>
