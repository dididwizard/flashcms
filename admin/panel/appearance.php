<?php include "../setting.php";
// Get Current Theme
$query = mysqli_query($dbc, "SELECT * FROM site WHERE id=1");
$themee = mysqli_fetch_assoc($query);
define("THEME_ACTIVE", $themee['theme']);
?>

<div id="appearance">
	<nav id="appr-menu" class="white">
		<button id="themes-btn">Themes</button><button>Header</button><button>Footer</button><button>Widget</button><button>Menu</button>
		<div id="theme-active"><?php echo THEME_ACTIVE;?></div>
	</nav>
	<div id="theme-manager">

		<div class="theme-list">
			<?php
			function handleActionButton($themes){ // Return Specified Button if Theme is Active
				if(strcmp(THEME_ACTIVE, $themes) == 0){
					return '<a class="btn-large blue waves-effect waves-blue" href="javascript:void(0)" id="'.str_replace("_", "a", $themes).'"><i class="fa fa-paint-brush"></i>&nbsp;&nbsp;Customize</a>';
				}else{
					return '<a class="btn-large blue waves-effect waves-blue" href="javascript:void(0)" id="'.str_replace("_", "-", $themes).'"><i class="fa fa-bolt"></i>&nbsp;&nbsp;Activate</a>';
				}
			}
			function handleActiveIcon($themes){
				if(strcmp(THEME_ACTIVE, $themes) == 0){
					return '<div class="theme-active-notif"><i class="fa fa-check"></i></div>';
				}else{
					return false;
				}
			}

			$location = '../themes/';
			$dir = dir($location);
			while ($entry = $dir->read())
			{
				if($entry == "." || $entry == ".."){
					continue;
				}
				if (is_dir($location . $entry))
				{
				error_reporting(E_ALL);

				// Load theme.xml
				$theme = simplexml_load_file("../themes/".$entry."/theme.xml");
				
				echo '
					<div id="theme">
						'.handleActiveIcon($entry).'
						<div class="theme-info" id="theme-info-'.$entry.'">
							<span>'.$theme->name.'</span>
							<span>'.$theme->description.'</span>
						</div>
						<div class="theme-option" id="theme-option-'.$entry.'">
							<button class="waves-effect"><i class="fa fa-download blue-text"></i><br>Download</button>
							<button class="waves-effect"><i class="fa fa-trash red-text"></i><br>Delete</button>
						</div>
						<img src="assets/images/pic01.jpg" />
						'.handleActionButton($entry).'
						<a class="btn-large white waves-effect waves-blue" href="javascript:void(0)"><i class="fa fa-eye"></i>&nbsp;&nbsp;Preview</a>
						<button class="theme-option-btn" id="theme-option-btn-'.$entry.'"><i class="fa fa-ellipsis-v"></i></button>
						<button class="theme-option-btn-close" id="theme-option-btn-close-'.$entry.'"><i class="fa fa-ellipsis-v"></i></button>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){

							$("#'.str_replace("_", "-", $entry).'").click(function(){
								$("#progress").fadeIn("fast");
								$.ajax({
									url: "./actions.php",
									method: "POST",
									dataType: "html",
									data: "theme='.$entry.'",
									success: function(response){
										setTimeout(function(){
											$.ajax({
												url: "./loader.php",
												type: "POST",
												dataType: "html",
												data: "page=appr",
												success: function(response){
													setTimeout(function(){
														$("main").html(response);
														$("#notification-popup").fadeIn("slow").html("Theme Changed");
													}, 500);
													$("#progress").fadeOut("slow");
													setTimeout(function(){
														$("#notification-popup").fadeOut("slow");
													}, 2000);
												},
											});
										}, 500);
									}
								});
							});
						
								$("#theme-option-btn-'.$entry.'").click(function(){
									$("#theme-info-'.$entry.'").fadeOut("fast");
									$("#theme-option-'.$entry.'").fadeIn("fast");
									$("#theme-option-btn-'.$entry.'").css("display", "none");
									$("#theme-option-btn-close-'.$entry.'").css("display", "inherit");
								});
								$("#theme-option-btn-close-'.$entry.'").click(function(){
									$("#theme-info-'.$entry.'").fadeIn("fast");
									$("#theme-option-'.$entry.'").fadeOut("fast");
									$("#theme-option-btn-'.$entry.'").css("display", "inherit");
									$("#theme-option-btn-close-'.$entry.'").css("display", "none");
								});
						});
					</script>
				';
				}
			}
			$dir->close();
			?>
		</div>
		
		<button id="theme-add-btn"><i class="fa fa-plus"></i></button>
		<div id="add-theme">
			<div id="at-title">
				<span>Add Theme</span>
			</div>
			<button id="close-at-btn" class="btn white black-text"><i class="fa fa-angle-down"></i></button>
			<div id="at-menu">
				<button><i class="fa fa-upload"></i>&nbsp;&nbsp;Upload</button>
				<button><i class="fa fa-folder"></i>&nbsp;&nbsp;Browse</button>
				<button><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp;Store</button>
			</div>
			<div id="upload-theme">
				<form action="../themes/theme_upload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="theme-upload" id="upload-field">
					<div id="rth"></div> 
					<input type="submit" value="Upload" id="upload-theme-btn">
					<input type="button" value="Upload" id="upload-theme-btn-nonactive">
				</form>
				<script>
					$(document).ready(function(){
						$("#theme-add-btn").click(function(){
							$("#add-theme").show("drop", {direction:"down"}, 300);
						});
						$("#close-at-btn").click(function(){
							$("#add-theme").hide("drop", {direction:"down"}, 300);
						});
						$("#upload-field").change(function(){
							var fileExtension = ['zip'];
							if($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1)
							{
								$("#upload-theme-btn").css("display", "none");
								$("#upload-theme-btn-nonactive").css("display", "inline-block");
								$("#rth").html("Only File Extension zip is allowed");

							}
							else
							{
								$("#upload-theme-btn").css("display", "inline-block");
								$("#upload-theme-btn-nonactive").css("display", "none");
								$("#rth").html("");
							}
							
						});
					});
				</script>
			</div>
		</div>

		<div id="progress">
			<i class="fa fa-cog fa-spin"></i>
			<span>Activating Theme...</span>
		</div>
	</div>
</div>