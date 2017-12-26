<?php
function getResourcePath($path){ // Get Full Path of Resource in theme Folder
	$url = $_SERVER['REQUEST_URI'];
	$urlParts = explode("/", $url);
	return "/".$urlParts[1]."/".$path;
}
function getLastPath($url){ // for /path/ format
	$path = parse_url($url, PHP_URL_PATH);
	$pathTrimmed = trim($path, '/');
	$pathTokens = explode('/', $pathTrimmed);

	if(substr($path, -1) !== '/'){
		array_pop($pathTokens);
	}
	return end($pathTokens);
}
function getUrlVar($url){
	return getLastPath(str_replace("-", " ", $url));
}
function postUrl($url){ // Use in List Post
	return str_replace(" ", "-", $url )."/";
}