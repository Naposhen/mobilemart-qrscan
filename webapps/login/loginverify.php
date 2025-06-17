<?php
session_start();

if(isset($_SESSION['mobilemart_posttoken'])) {
	header('location: ../apps');
}
include '../php/functions.php';
include '../php/config.php';

if(isset($_POST['commit']) && isset($_POST['userid']) && isset($_POST['userpasswd']) && isset($_POST['pretoken'])) {
	if($_SESSION['mobilemart_pretoken']==$_POST['pretoken']) {
		$usr=mybase64_decodesafe($_POST['userid']);
		$passwd=mybase64_decodesafe($_POST['userpasswd']);
		
		include '../php/connect.php';
		$result=mysql_query("select passwd from tb_user where username='$usr'");
		if($result) {
			if(mysql_num_rows($result)==1) {
				if($passwd==mysql_result($result,0,0)) {
					$_SESSION['mobilemart_userid']=$usr;
					$_SESSION['mobilemart_posttoken'] = md5(uniqid(mt_rand(),true));
					mysql_close($conn);
					header('location: ../apps');
				} else {
					$_SESSION['mobilemart_pesanlogin']='Wrong Password...';
					mysql_close($conn);
					header('location: login.php');
				}
			} else {
				if(mysql_num_rows($result)==0) $_SESSION['mobilemart_pesanlogin']='User ID Not Found...';
				else $_SESSION['mobilemart_pesanlogin']='Result Count Error:'.mysql_num_rows($result);
				mysql_close($conn);
				header('location: login.php');				
			}
		} else {
			$_SESSION['mobilemart_pesanlogin']='DB Error:'.mysql_error().', Result Count:'.mysql_num_rows($result);
			mysql_close($conn);
			header('location: login.php');				
		}
	} else {
		$_SESSION['mobilemart_pesanlogin']='Token Error...';
		header('location: login.php');
	}
} else {
	$_SESSION['mobilemart_pesanlogin']='Login Error...';
	header('location: login.php');
}
?>