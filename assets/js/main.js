$(document).ready(function() {
	var username = $("#username");
	var password = $("#password");
	$("#login").on('click',function() {
		if(username.val() == ""){
			alert('username tidak boleh kosong');
			username.focus();
		}else if(password.val() == ""){
			alert('password tidak boleh kosong');
			password.focus();
		}else{
			$.$.ajax({
				url: "<?=base_url('index.php/auth/login')"?>,
				type: 'POST',
				dataType: 'JSON',
				data: username,password,
				success:function(data){
					alert(data);
				}
			});
			
		}
	});
});