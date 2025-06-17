$(document).ready(function(){
	$('#username').select().focus();
	
	$('#username').keydown(function(e){
		if(e.keyCode == 13) {
			if($(this).val().length==0) {$(this).focus();e.preventDefault();}
			else {$('#password').select().focus();}
		}
	});
	
	$('#password').keydown(function(e){
		if(e.keyCode == 13) {
			if($(this).val().length==0) {$(this).focus();e.preventDefault();}
			else {
				$('#formlogin').attr('onkeypress','');
				$('#bsubmit').trigger('click');
			}
		}
	});

	$('#bsubmit').click(function(e){
		if($('#username').val().length==0 || $('#password').val().length==0) {
			alert('Login Invalid...');
			e.preventDefault();
		}
		$('#enpasswd').val(CryptoJS.MD5($('#password').val()).toString());
		$('#enuserid').val($.base64.encodesafe($('#username').val()));
		$('#enpasswd').val($.base64.encodesafe($('#enpasswd').val()));
		
	});
	
});