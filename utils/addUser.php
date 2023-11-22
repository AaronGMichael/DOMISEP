<?php
//start session
session_start();

include_once('user.php');
include_once('DbUtils.php');
include_once('Person.php');
 
$user = new User();
 
if(isset($_POST['register'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
    // $name = $user->escape_string($_POST['name']);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$p = new Person(100, $username, $hash, 101, "Name", "Name", "@");
	$success = DBUtils::setUser($p);
	// $user->create_user($username, $password, $name);
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