<?php
include "data/config_loader.php";
include "data/connection.php";
include "data/functions.php";
include "data/variables.php";
if($_GET["post"]){
	include $THEME."post.php";
}else if($_GET["page"]){
	include $THEME."page.php";
}else{
	include $THEME."index.php";
}