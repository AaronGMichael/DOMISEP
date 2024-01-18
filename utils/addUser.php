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
	$name = $_POST['name'];
	$firstName = $_POST['firstname'];
	$accessRights = (int)$_POST['accessrights'];
	$email = $_POST['email'];
    // $name = $user->escape_string($_POST['name']);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$p = new Person(100, $username, $hash, $accessRights, $name, $firstName, $email);
	$success = DBUtils::setUser($p);
	// $user->create_user($username, $password, $name);
    debug_to_console($success);
	if(!$success){
		$_SESSION['message'] = 'Account Already Exists';
    	header('location:../views/register.php');
	}
	else{
		$_SESSION['AccountCreated'] = 'Account Created!';
		header('location:../views/profile.php');
	}
}
else{
	$_SESSION['message'] = 'You need to register first';
	header('location:../views/register.php');
}
