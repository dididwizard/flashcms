$(document).ready(function(){

	$("#setting-form").submit(saveSetting);
	function saveSetting(e){
		$.ajax({
			url: "save_setting.php",
			dataType: "text",
			type: "post",
			contentType: "application/x-www-form-urlencoded",
			data: $(this).serialize(),
			success: function(data, status){
				$("#response").fadeIn("fast");
				setTimeout(function(){
					$("#response").fadeOut("fast");
				}, 800);
			}
		});
		e.preventDefault();
	}
	

});


