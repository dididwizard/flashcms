<?php
error_reporting(0);
$file = $_POST['file'];
$folder = $_POST['folder'];

if(unlink("../files/$file")){
	echo "Success deleting file";
}else if(rmdir("../files/$folder")){
	echo "Success deleting folder";
}
else{
	echo "Process Error<br />\n";
	echo "Folder or File not specified";
	echo "<br /><br />-------<br />";
	echo "&copy; Flash CMS ";
};

?>