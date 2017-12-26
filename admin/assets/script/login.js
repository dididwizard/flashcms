$(document).ready(function(){

	$("#username").keyup(function(){
		if(this.value.length >= 6){
			$("#username").css("box-shadow", "inset 0 0 5px rgba(0,150,136,0.4)");
			$("#login-notif").fadeOut("fast");
		}else{
			$("#username").css("box-shadow", "inset 0 0 8px rgba(0,0,0,0.1)");
		}
	}); 
	$("#password").keyup(function(){
		if(this.value.length >= 6){
			$("#password").css("box-shadow", "inset 0 0 5px rgba(0,150,136,0.4)");
			$("#login-notif").fadeOut("fast");
		}else{
			$("#password").css("box-shadow", "inset 0 0 8px rgba(0,0,0,0.1)");
		}
	});

	$("#login-form").submit(login);
	function login(e){
		$("#loading").fadeIn("fast");
		$.ajax({
			url: 'login.php',
			method: 'POST',
			dataType: 'text',
			data: $(this).serialize(),
			success: function(data){
				if(data=='error'){
					setTimeout(function(){
						$("#loading").fadeOut("fast");
					},300);
					setTimeout(function(){
						$("#login-notif").fadeIn("fast");
					},500);
				}else{
					setTimeout(function(){
						$("#loading span").html("Reloading");
						window.location.reload();
					},300);
				}
			}
		});
		e.preventDefault();
	}

	$("#close-notif").click(function(){
		$("#login-notif").fadeOut("fast");
	});
});