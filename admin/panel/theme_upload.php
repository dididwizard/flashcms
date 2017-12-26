<?php
error_reporting(0);
$filename = $_FILES['theme-upload']['name'];
$filetype = $_FILES['theme-upload']['type'];
$source = $_FILES['theme-upload']['tmp_name'];
$pathfile = $filename;

if (move_uploaded_file($source, $pathfile)){
	$zip = new ZipArchive();
	$basename = basename($filename, ".zip");
	$pathextract = str_replace(".", "_", $basename);
	mkdir("$pathextract");
	$extract = $zip->open($pathfile);
	if ($extract === true){
		$zip->extractTo($pathextract);
		$zip->close();
		unlink($pathfile);
		echo 'Theme Successfully Uploaded';
	}
	
}else{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Theme Upload</title>
	</head>
	<body>
		<h2>There is problem when Uploading Theme</h2>
	</body>
</html><?php }?>