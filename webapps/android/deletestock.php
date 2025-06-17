<?php
if(isset($_GET['data'])) $data=$_GET['data']; else {echo "NoArguments";exit();}
include '../php/connect.php';

$cmd="delete from tb_stock where id='$data'";
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Deleting StockDB: ".mysql_error();
	mysql_close($conn);
	exit();
}

echo "Success";
mysql_close($conn);

?>