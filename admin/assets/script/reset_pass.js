$(document).ready(function(){
	$("#reset-pass").submit(resetPass);
	function resetPass(e){
		$("#progress").fadeIn("slow");
		$.ajax({
			url: 'reset_password.php',
			method: 'POST',
			dataType: 'text',
			data: $(this).serialize(),
			success: function(data){
				if(data=='error'){
					setTimeout(function(){
						$("#progress").fadeOut("fast");
					},300);
					setTimeout(function(){
						$("#login-notif").fadeIn("fast");
					},500);
				}else{
					setTimeout(function(){
						$("#progress span").html("Reloading");
					},300);
					setTimeout(function(){
						$("#progress span").html("Reloading..");
						window.location.reload();
					},500);
				}
			}
		});
		e.preventDefault();
	};
	$("#set-pass").submit(setPass);
	function setPass(e){
		$("#progress").fadeIn("slow");
		$.ajax({
			url: 'reset_password2.php',
			method: 'POST',
			dataType: 'text',
			data: $(this).serialize(),
			success: function(data){
				setTimeout(function(){
					$("#progress span").html("Reloading");
				},300);
				setTimeout(function(){
					$("#progress span").html("Reloading..");
					window.location.href = "reset_password.php"
				},500);
			}
		});
		e.preventDefault();
	};
});