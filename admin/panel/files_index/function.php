<?php
function byte_convert($size){
	if ($size < 1024) return $size . ' B';
	if ($size < 1048576) return sprintf("%4.2f KB", $size/1024);
	if ($size < 1073741824) return sprintf("%4.2f MB", $size/1048576);
	if ($size < 1099511627776) return sprintf("%4.2f GB", $size/1073741824);
	else return sprintf("%4.2f TB", $size/1073741824);
}; 
function convertChars($file){ // Convert Special Character to Specified Alphabet
	$convert = array(
		"." => "a",
		"-" => "b",
		"_" => "c",
		"@" => "d",
		"#" => "e",
		"$" => "f",
		"%" => "g",
		"^" => "h",
		"&" => "i",
		"(" => "j",
		")" => "k",
		"{" => "l",
		"}" => "m",
		"[" => "n",
		"]" => "o",
		"+" => "p",
		"=" => "q",
		";" => "r",
		"'" => "s",
		"," => "t",
		"~" => "u",
		"`" => "v",
		"!" => "w", 
		);
	return strtr($file, $convert);
}
function file_type($file){
	if(strpos($file, ".txt")){
		return '<i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp;'. $file;
	}if(strpos($file, ".zip")){
		return '<i class="fa fa-file-zip-o"></i>&nbsp;&nbsp;&nbsp;'. $file;
	}if(strpos($file, ".jpg")){
		return '<i class="fa fa-file-image-o"></i>&nbsp;&nbsp;&nbsp;'. $file;
	}else{
		return '<i class="fa fa-file-o"></i>&nbsp;&nbsp;&nbsp;'. $file;
	}
};
?>