<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_GET['data'])) $data=$_GET['data']; else {echo "NoArguments";exit();}
include '../php/connect.php';

$adata=explode(';;;',$data);
$cmd="update tb_stock set name_item='$adata[1]',cate_item='$adata[2]',unit='$adata[3]',location_item='$adata[4]',exp_item='$adata[5]',price_item=$adata[6] where id='$adata[0]'";
//file_put_contents('1.txt',$cmd);
$result=mysql_query($cmd);
if(!$result) {
	echo "Error Updating StockDB: ".mysql_error();
	mysql_close($conn);
	exit();
}

echo "Success";
mysql_close($conn);

?>