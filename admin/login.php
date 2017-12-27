<?php
include "../setting.php";
session_start();
if(isset($_SESSION['username'])){
	header("location: ./");
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = mysqli_real_escape_string($dbc, $_POST['username']);
	$password = mysqli_real_escape_string($dbc, $_POST['password']);
	$sql = "SELECT id FROM accounts WHERE username='$username' AND password='$password'";
	$result = mysqli_query($dbc, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		session_start();
		$_SESSION['username'] = $username;
	}else{
		echo "error";
	}
}else{?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin - Login</title>
	<meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
</head>
<body>
	<div id="login">
		<form id="login-form">
			<center>
				<input type="text" placeholder="&#xf007;&nbsp;&nbsp;&nbsp;Username" name="username" id="username">
				<input type="password" placeholder="&#xf023;&nbsp;&nbsp;&nbsp;Password" name="password" id="password">
				<!--<input type="checkbox" value="remember" name="remember" id="remember">
				<label for="remember"><span>Remember Me</span></label>--><br><a id="reset-pass-link" href="reset_password.php" target="_blank"><i class="fa fa-lock"></i>&nbsp;&nbsp;Reset Password</a>
				<input type="submit" value="Login" name="submit" id="submit" class="btn waves-effect"><br>
			</center>
			<left></left>
			<left><span id="login-notif"><a href="javascript:void(0)" id="close-notif"><i class="fa fa-times"></i></a>&nbsp;&nbsp;&nbsp;Username or Password not Found</span></left>
		</form>
		<div id="loading">
		<i class="fa fa-spin fa-cog"></i><br><span>Processing</span>
		</div>
		<button id="options"><i class="fa fa-bars"></i></button>
	</div>
	<script src="assets/script/jquery.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="assets/script/login.js"></script>
</body>
</html><?php }?>