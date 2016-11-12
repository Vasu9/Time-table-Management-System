<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['member']);
unset($_SESSION['admin']);
session_destroy();

header("Location: index.php");
exit;
?>