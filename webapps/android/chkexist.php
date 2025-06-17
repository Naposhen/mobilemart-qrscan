<?php
if(isset($_GET['data'])) $data=$_GET['data']; else {echo "NoArguments";exit();}
include '../php/connect.php';

$cmd="select id,name_item,cate_item,unit,location_item,exp_item,price_item from tb_stock where id='$data' limit 1";
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Checking StockDB: ".mysql_error();
	mysql_close($conn);
	exit();
}
if(mysql_num_rows($result)==0) {
	echo "NotFound";
} else {
	while($row=mysql_fetch_row($result)) {
		echo "$row[0];;;$row[1];;;$row[2];;;$row[3];;;$row[4];;;$row[5];;;$row[6]";
	}
}

mysql_close($conn);

?>