<?php
set_time_limit(300);
session_start();

if(isset($_SESSION['mobilemart_posttoken'])) {
	header('location: ../apps');
}
include '../php/functions.php';
include '../php/config.php';

if(!isset($_jquerysrc)) $jquerysrc='../js/jquery-1.8.3.min.js'; else $jquerysrc=$_jquerysrc;
if(!isset($_version)) $ver='1'; else $ver=$_version;

?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Login - Mobile Mart</title>
	<link href='../css/fonts.css' rel='stylesheet' type='text/css'>
	<?php echo "
	<link rel='stylesheet' href='../css/global.css?version=$ver'>
	<link rel='stylesheet' href='../css/popup_win.css?version=$ver'>
	<link rel='stylesheet' href='css/login.css?version=$ver'>

	<script src='$jquerysrc'></script>
	<script src='../js/blockUI.js?version=$ver'></script>
	<script src='../js/md5.js?version=$ver'></script>
	<script src='../js/base64.js?version=$ver'></script>
	<script src='../js/base64.js?version=$ver'></script>
	<script src='js/login.js?version=$ver'></script>
	"; ?>
</head>
<?php
$pretoken = $_SESSION['mobilemart_pretoken'] = md5(uniqid(mt_rand(),true));
?>
<body>
	<h1>Mobile Mart Administration</h1>
	<div id='outter'>
		<img src='img/login.png'>
		<h1 class='text' id='welcome'>Welcome. <span>please login.</span></h1>
		<form method='post' id='loginform' action='loginverify.php' onkeypress='return event.keyCode != 13;'>
			<input type='text' id='username' placeholder='Username'>
			<input type='password' id='password' placeholder='Password'>

			<input type='hidden' id='enuserid' name='userid' value=''>
			<input type='hidden' id='enpasswd' name='userpasswd' value=''>
			<input type='hidden' name='pretoken' value='<?php echo $pretoken; ?>'>
			<div class='login'>
				<input type='submit' value='Login' name='commit' id='bsubmit'>
			</div><!-- /login -->
		</form>
		<span id='pesanlogin'><?php if(isset($_SESSION['mobilemart_pesanlogin'])) echo $_SESSION['mobilemart_pesanlogin']; ?></span>
	</div>

</body>
<?php $_SESSION['mobilemart_pesanlogin']=''; ?>
</html>