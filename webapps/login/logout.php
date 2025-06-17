<?php 
session_start();

if(!isset($_SESSION['mobilemart_posttoken'])) {
	echo "<h1>Token Not Set Error...</h1>";
	exit();
}

session_unset();
session_destroy();
header("location: index.php");

?>
