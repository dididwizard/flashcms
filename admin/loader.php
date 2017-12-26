<?php
error_reporting(0);
if($_POST['page']=='overview'){
	include 'panel/overview.php';
}
else if($_POST['page']=='appr'){
	include 'panel/appearance.php';
}
else if($_POST['page']=='pref'){
	include 'panel/preferences.php';
}
else if($_POST['page']=='fm'){
	include 'panel/file_manager.php';
}
else{
	header("location:./");
}
?>