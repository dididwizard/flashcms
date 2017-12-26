<?php 
include "connection.php";
session_start();
if (!isset($_SESSION["username"])){
	header("location:login.php");
}else{
?><!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta charset="UTF-8">
		<title>Admin Panel - Flash CMS</title>
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/fm.css">
		<link rel="stylesheet" href="assets/css/appr.css">
		<link rel="stylesheet" href="assets/css/preferences.css">
		<link rel="stylesheet" href="assets/css/overview.css">
		<link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
		<link rel="stylesheet" href="assets/materialize/material-icons/material-icons.css">
		<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/script/jquery-ui/jquery-ui.min.css">
	</head>
	<body onload="show('overview');">
		<header>
			<a id="menu-btn" class=""><i class="fa fa-bars"></i></a>
			<div id="panel-active-indicator"></div>
			<a id="visit-site-btn" class="" href="../" target="_blank"><i class="fa fa-globe"></i>&nbsp;&nbsp;<span>Visit Site</span></a>
			<a id="option-btn" class=""><i class="fa fa-user"></i></a>
			<a id="option-btn-close" class=""><i class="fa fa-user"></i></a>
			<div id="option-menu">
				<div id="short-profile">
					<div></div>
					<span>Didid flash</span>
				</div>
				<button class="waves-effect waves-light"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Profile</button>
				<button class="waves-effect waves-light"><i class="fa fa-comment"></i>&nbsp;&nbsp;&nbsp;Forums</button>
				<button class="waves-effect waves-light"><i class="fa fa-cog"></i>&nbsp;&nbsp;&nbsp;Setting</button>
				<button class="waves-effect waves-light" id="logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;Log Out</button>
			</div>
		</header>

		<nav class="menu">
				<div id="title-header">Flash CMS</div>
				<a class="btn-large waves-effect waves-semi-black" onclick="show('overview');"><i class="fa fa-bars"></i>&nbsp;&nbsp;&nbsp;&nbsp;Overview</a>
				<a class="btn-large waves-effect waves-semi-black" ><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Post</a>
				<a class="btn-large waves-effect waves-semi-black" ><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;Pages</a>
				<a class="btn-large waves-effect waves-semi-black" onclick="show('fm');"><i class="fa fa-folder"></i>&nbsp;&nbsp;&nbsp;&nbsp;File Manager</a>
				<a class="btn-large waves-effect waves-semi-black" onclick="show('appr');"><i class="fa fa-paint-brush"></i>&nbsp;&nbsp;&nbsp;&nbsp;Appearances</a>
				<a class="btn-large waves-effect waves-semi-black" ><i class="fa fa-puzzle-piece"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add-Ons</a>
				<a class="btn-large waves-effect waves-semi-black" onclick="show('pref');"><i class="fa fa-wrench"></i>&nbsp;&nbsp;&nbsp;&nbsp;Preferences</a>			<!--<div id="overview-panel">
				<a><i class="fa fa-dashboard" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
				<a><i class="fa fa-line-chart" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statistics</a>
				<a><i class="fa fa-group" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visitor</a>
				<a><i class="fa fa-comment" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comments</a>
				<a><i class="fa fa-envelope" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Messages</a>
				<a><i class="fa fa-group" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Social</a>
			</div>
			<div id="appr-panel">
				<a><i class="fa fa-paint-brush" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Themes</a>
				<a><i class="fa fa-newspaper-o" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contents</a>
				<a><i class="fa fa-rss" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RSS</a>
				<a><i class="fa fa-bars" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Navigation</a>
				<a><i class="fa fa-comment" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comments</a>
				<a><i class="fa fa-edit" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advanced Editor</a>
			</div>
			<div id="pref-panel">
				<a><i class="fa fa-globe" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site</a>
				<a><i class="fa fa-user" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile</a>
				<a><i class="fa fa-database" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Database</a>
				<a><i class="fa fa-link" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permalinks</a>
				<a><i class="fa fa-paint-brush" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CMS Appearance</a>
				<a><i class="fa fa-info-circle" style="color:"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About</a>
			</div>-->
		</nav>

		<main>

		</main>
		<div id="loader">
			<img src="assets/images/ajax-loader.gif" width="40px">
		</div>
		<div id="notification-popup"></div>
		
		<script src="assets/script/jquery.min.js"></script>
		<script src="assets/script/jquery-ui/jquery-ui.min.js"></script>
		<script src="assets/materialize/js/materialize.min.js"></script>
		<script src="assets/script/index.js"></script>
	</body>
</html><?php }?>