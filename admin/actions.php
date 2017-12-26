<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include "connection.php";
	// Set Theme
	if($_POST['theme']){
		$theme = mysqli_real_escape_string($dbc, $_POST['theme']);
		$update = $dbc->prepare("UPDATE site SET theme=?");
		$update->bind_param("s", $theme);
		$update->execute();
		echo "Theme Changed";
	}else{
		echo "Unknown Action";
	}
}else{
	header("location:./");
}
?>