<?php
function mybase64_encode($input) {
$default = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
$custom  = "MNBVCXZASDFGHJKLPOIUYTREWQpoiuytrewqlkjhgfdsamnbvcxz5432109876|_`";

return strtr(base64_encode($input), $default, $custom);
}



function mybase64_decodesafe($input) {
	$imax = strlen($input);
	if($imax>16) {
		$split1 = substr($input,$imax-16,13);
		$split2 = substr($input,128,$imax-272);
		$split3 = substr($input,$imax-3);
		
		$ret = $split1.$split2.$split3;
	} else {
		$ret = $input;
	}
	
	return mybase64_decode($ret);
}


function mybase64_decode($input) {
$default = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
$custom  = "MNBVCXZASDFGHJKLPOIUYTREWQpoiuytrewqlkjhgfdsamnbvcxz5432109876|_`";

return base64_decode(strtr($input,$custom,$default));
}

function secondsToTime($ss) {
	$days = floor($ss/86400);
	$days_mod = $ss%86400;
	$hours = floor($days_mod/3600);
	$hours_mod = $days_mod%3600;
	$minutes = floor($hours_mod/60);
	$minutes_mod = $hours_mod%60;
	$seconds = floor($minutes_mod);

    $seconds = $seconds < 10 ? '0' . $seconds : $seconds;
    $minutes = $minutes < 10 ? '0' . $minutes : $minutes;
    $hours = $hours < 10 ? '0' . $hours : $hours;

	if($days==0) return "$hours:$minutes:$seconds";
	else return "$days day(s)-$hours:$minutes:$seconds";
}

?>
