<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_GET['data'])) $data=$_GET['data']; else {echo "NoArguments";exit();}
include '../php/connect.php';

$adata=explode(';;;',$data);
$cmd="insert into tb_stock (id,name_item,cate_item,unit,location_item,exp_item,price_item) values('$adata[0]','$adata[1]','$adata[2]','$adata[3]','$adata[4]','$adata[5]',$adata[6])";
//file_put_contents('1.txt',$cmd);
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Inserting StockDB: ".mysql_error();
	mysql_close($conn);
	exit();
}

echo "Success";
mysql_close($conn);

?>