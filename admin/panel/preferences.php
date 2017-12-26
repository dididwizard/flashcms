<?php
error_reporting(0);

$config = simplexml_load_file("../config.xml");
define("DB_HOST", $config->Database->host);
define("DB_USER", $config->Database->user);
define("DB_PASS", $config->Database->pass);
define("DB_NAME", $config->Database->name);

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = mysqli_query($dbc, "SELECT * FROM site");
while($site_data = mysqli_fetch_array($sql)){

$title = $site_data['title'];
$description = $site_data['description'];
$keywords = $site_data['keywords'];
$author = $site_data['author'];
$js_mode = $site_data['js_mode'];
$language = $site_data['language'];
$timezone = $site_data['timezone'];
}
?><div class="preferences">
	<div class="pref-site">
		<form action="" method="post" id="form-pref-site">
			<table width="100%">
				<tr id="site-title">
					<td>Title</td>
					<td><input type="text" name="title" value="<?php echo $title?>"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="description" value="<?php echo $description?>"></td>
				</tr>
				<tr>
					<td>Keywords</td>
					<td><input type="text" name="keywords" value="<?php echo $keywords?>"></td>
				</tr>
				<tr>
					<td>JS Mode</td>
					<td>
						<select name="js-mode">
							<option><?php echo $js_mode?></option>
							<option>------</option>
							<option>Enable</option>
							<option>Disable</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Language</td>
					<td>
						<select name="language">
							<option><?php echo $language?></option>
							<option>------</option>
							<option>Indonesia</option>
							<option>Malaysia</option>
							<option>Thailand</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Timezone</td>
					<td>
						<select name="timezone">
							<option><?php echo $timezone?></option>
							<option>------</option>
							<option>UTC +7</option>
							<option>UTC +8</option>
							<option>UTC +9</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Save" id="save-pref-link"></td>
				</tr>
			</table>
		</form>
		<script>
			$(document).ready(function(){
				$("#form-pref-site").submit(savePref);
					function savePref(e){
						$.ajax({
							url: "save_preferences.php",
							dataType: "text",
							type: "post",
							contentType: "application/x-www-form-urlencoded",
							data: $(this).serialize(),
							success: function(data, status){

								setTimeout(function(){
									$.ajax({
										url: "loader.php",
										type: "POST",
										dataType: "html",
										data: "page=pref",
										success: function(response){
											setTimeout(function(){
												$("main").html(response);
											}, 500);
											$("#progress").fadeOut("slow");
										},
									});
								}, 300);
							}
						});
						e.preventDefault();
				}
			});
		</script>
	</div>
</div>