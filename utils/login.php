<?php
//start session
session_start();
 
include_once('user.php');
include_once('DbUtils.php');
 
$user = new User();
 
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$P = DbUtils::getUser($username);
	if(!is_object($P)) $auth = false;
	else $auth = $P->verify($password);

	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:../index.php');
	}
	else{
		$_SESSION['user'] = $P;
		$_SESSION['welcome'] = "Welcome $P->name";
		if($P->isAdmin() || $P->isOwner()){
			header('location:../views/home.php');
		}
		else{
			header('location:../views/apartment.php');
		}
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:../index.php');
}
?>