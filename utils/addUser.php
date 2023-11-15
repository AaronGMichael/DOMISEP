<?php
//start session
session_start();

include_once('user.php');
 
$user = new User();
 
if(isset($_POST['register'])){
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
    $name = $user->escape_string($_POST['name']);
	$success = $user->create_user($username, $password, $name);
    debug_to_console($success);
	if(!$success){
		$_SESSION['message'] = 'Account Already Exists';
    	header('location:../views/register.php');
	}
	else{
		$_SESSION['AccountCreated'] = 'Account Created!';
		header('location:../index.php');
	}
}
else{
	$_SESSION['message'] = 'You need to register first';
	header('location:../views/register.php');
}
?>