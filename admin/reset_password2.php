<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	include "connection.php";
	$key = mysqli_real_escape_string($dbc, $_POST['key']);
	$password = mysqli_real_escape_string($dbc, $_POST['password']);
	$update = $dbc->prepare("UPDATE accounts SET password=? WHERE reset_pass_key=?");
	$update->bind_param("ss", $password, $key);
	$update->execute();
	echo "success";
	session_start();
	unset($_SESSION['reset_password']); 
}else{
	header("location:./reset_password.php");
}