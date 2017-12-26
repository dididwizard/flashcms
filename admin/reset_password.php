<?php
error_reporting(E_ALL);
include "connection.php";
session_start();
if(isset($_SESSION['reset_password'])){?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin - Reset Password</title>
	<meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/reset_pass.css">
	<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
</head>
<body>
	<div id="notification">
		<span>The Password Reset Link Has Been Sent to your Email (<?php echo htmlspecialchars($_SESSION['reset_password']);?>).</span><br>
		<span>Please Check your Email.</span><br>
		<a>Reset Password for Another Account</a>
	</div>
	<script src="assets/script/jquery.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="assets/script/reset_pass.js"></script>
</body>
</html><?php }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	$query = mysqli_query($dbc, "SELECT * FROM accounts WHERE email='$email'");
	$match = mysqli_num_rows($query);
	if($match == 1){
		// Make The Code
		$code = str_shuffle(sha1(str_rot13($email)));
		$code2 = $code.str_shuffle(sha1(str_rot13(rand(1000, 10000))));
		$update = $dbc->prepare("UPDATE accounts SET reset_pass_key=? WHERE email=?");
		$update->bind_param("ss", $code2, $email);
		$update->execute();
		// Make The Link
		$getUsername = mysqli_fetch_assoc($query)['username'];
		$mailTitle = "Password Reset Link";
		$mailContent = "
You Has Been Request to Reset your Password for FlashCMS Account :
".$email."
Click this link to Reset your Password : 
http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?username=".$getUsername."&key=".$code2."

If this not You, Please Ignore this Message and Secure your Account.

~ FlashCMS Bot
		";
		// Sending Email
		function changeHost($host){
			if($host == "localhost"){
				return $host.".net";
			}else{
				return Shost;
			}
		}
		$sender = "flashcms@".changeHost($_SERVER['HTTP_HOST']);
		$mail = mail($email, $mailTitle, $mailContent, "From: ".$sender);
		if($mail){
			// If Success, then Set Session
			session_start();
			$_SESSION['reset_password'] = $email;
		}
	}else{
		echo "error";
	}
//////////////////////////////////////////////
}else if($_GET){
	$username = mysqli_real_escape_string($dbc, $_GET['username']);
	$key = mysqli_real_escape_string($dbc, $_GET['key']);
	$query = mysqli_query($dbc, "SELECT * FROM accounts WHERE username='$username' AND reset_pass_key='$key'");
	$match = mysqli_num_rows($query);
	if($match == 1){?><!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin - Reset Password</title>
	<meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/reset_pass.css">
	<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
</head>
<body>
	<div id="set-password">
		<form id="set-pass">
			<span>Enter a New Password</span><br>
			<input type="text" name="password" id="password" placeholder="&#xf023;&nbsp;&nbsp;Password">
			<input type="text" name="key" id="hidden-key" value="<?php echo htmlspecialchars($_GET['key']);?>">
			<input type="submit" name="submit" id="submit" value="Set Password">
			<div id="progress">
				<i class="fa fa-spin fa-cog"></i>&nbsp;&nbsp;<span>Setting a New Password..</span>
			</div>
		</form>
	</div>
	<script src="assets/script/jquery.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="assets/script/reset_pass.js"></script>
</body>
</html><?php }else{
		echo "<title>Admin - Reset Password</title>\n";
		echo "Error Resetting Password..<br>\n";
		echo "Username and Key not Match\n";
	}
}else{
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin - Reset Password</title>
	<meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/reset_pass.css">
	<link rel="stylesheet" href="assets/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
</head>
<body>
	<div id="reset-password">
		<form id="reset-pass">
			<span>Enter your Email</span><br>
			<input type="text" name="email" id="email" placeholder="&#xf0e0;&nbsp;&nbsp;Email">
			<input type="submit" name="submit" id="submit" class="" value="Submit">
		</form>
		<div id="progress">
			<i class="fa fa-spin fa-cog"></i>&nbsp;&nbsp;<span>Processing Request..</span>
		</div>
	</div>
	<script src="assets/script/jquery.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
	<script src="assets/script/reset_pass.js"></script>
</body>
</html><?php }?>