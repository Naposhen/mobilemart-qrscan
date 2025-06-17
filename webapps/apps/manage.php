<?php
session_start();
if(!isset($_SESSION['mobilemart_posttoken'])) {
	header('location: ../login');
}
include '../php/functions.php';
include '../php/config.php';

include '../php/connect.php';

if(!isset($_jquerysrc)) $jquerysrc="../js/jquery-1.8.3.min.js"; else $jquerysrc=$_jquerysrc;
if(!isset($_version)) $ver="1"; else $ver=$_version;

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

$tabledata="<table id='data'>";
$tabledata.="<tr>";
$tabledata.="<th>Barcode</th>";
$tabledata.="<th>Name Item</th>";
$tabledata.="<th>Category Item</th>";
$tabledata.="<th>Unit</th>";
$tabledata.="<th>Location</th>";
$tabledata.="<th>Expiry Date</th>";
$tabledata.="<th>Price</th>";
$tabledata.="<th></th>";
$tabledata.="</tr>";
while($row=mysql_fetch_row($result)) {
	$tabledata.="<tr>";
	$tabledata.="<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td align=center>$row[5]</td>
	<td align=right>".number_format($row[6],0)."</td>";
	$tabledata.="<td width=15% align=center><button>EDIT</button><button>DELETE</button></td>";
	$tabledata.="</tr>";
}
$tabledata.="</table>";
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Mobilmart</title>
	<link href='../css/fonts.css' rel='stylesheet' type='text/css'>
	<?php echo "
	<link rel='stylesheet' href='../css/global.css?version=$ver'>
	<link rel='stylesheet' href='../css/jquery-ui.min.css?version=$ver'>
	<link rel='stylesheet' href='../css/popup_win.css?version=$ver'>
	<link rel='stylesheet' href='css/manage.css?version=$ver'>

	<script src='$jquerysrc'></script>
	<script src='../js/blockUI.js?version=$ver'></script>
	<script src='../js/base64.js?version=$ver'></script>
	<script src='../js/jquery-ui.min.js?version=$ver'></script>
	<script src='js/manage.js?version=$ver'></script>
	"; ?>
</head>
<body>
	<h1>Mobile Mart - Data Stock</h1>
	<h3 style='margin:0;padding:3px;text-align:right;'><a href='' onclick='return false;'>New Stock</a> <a href='../login/logout.php'>Logout</a></h3>
	<?php
	echo $tabledata;
	?>
</body>
</html>
<?php mysql_close($conn); ?>