$(document).ready(function(){
	$(".parallax").parallax();
	$("#option-btn").click(function(){
		$("#option-btn-close").css("display", "inherit");
		$("#option-btn").css("display", "none");
		$("#option-menu").fadeIn("fast");
	});
	$("#option-btn-close, main").click(function(){
		$("#option-btn").css("display", "inherit");
		$("#option-btn-close").css("display", "none");
		$("#option-menu").fadeOut("fast");
	});
	$("#logout").click(function(){
		window.location.href  = "logout.php";
	});
});

function show(page){
$("#loader").fadeIn("slow");
$.ajax({
	url: "./loader.php",
	type: "POST",
	dataType: "html",
	data: "page="+page,
	success: function(response){
			$("main").html(response);
			$("#loader").css("display", "none");

			$(".panel-menu div").css("display", "none");
			$("#"+page+"-panel").fadeIn("slow");
	},
});
};

