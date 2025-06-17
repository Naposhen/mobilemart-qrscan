<?php
include '../php/connect.php';

$cmd="select id,name_item,cate_item,unit,location_item,exp_item,price_item from tb_stock order by name_item";
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Getting StockDB: ".mysql_error();
	mysql_close($conn);
	exit();
}

if(mysql_num_rows($result)==0) {
	echo "DataEmpty";
	mysql_close($conn);
	exit();
}

$ret="";
while($row=mysql_fetch_row($result)) {
	$ret.="$row[0];;;$row[1];;;$row[2];;;$row[3];;;$row[4];;;$row[5];;;$row[6]___";
}

$ret=substr($ret,0,-3);
echo "httpok;~;~;".$ret;
mysql_close($conn);

?>