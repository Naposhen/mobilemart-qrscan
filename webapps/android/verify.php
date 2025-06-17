<?php
if(isset($_GET['user'])) $user=$_GET['user']; else {echo "NoArguments";exit();}
include '../php/connect.php';

$cmd="select passwd from tb_user where username='$user' limit 1";
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Getting UserDB: ".mysql_error();
	mysql_close($conn);
	exit();
}

if(mysql_num_rows($result)==0) {
	echo "NotFound";
	mysql_close($conn);
	exit();
}

echo mysql_result($result,0,0);

mysql_close($conn);

?>