<?php
$username="eigthrse_mmart";
$username='root';
$password="123123123";
$password='7834';
$database="eigthrse_mobilemart";
$database="mobilemart";
$conn=mysql_connect('localhost',$username,$password) or die("connect fail...");
@mysql_select_db($database,$conn) or die( "Unable to select database");
mysql_query("SET names 'utf8'");
mysql_query("SET time_zone='+07:00'");
mysql_query("SET long_query_time=10");
?>