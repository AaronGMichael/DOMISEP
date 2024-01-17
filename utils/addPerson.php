<?php
//start session
session_start();

include_once('DbUtils.php');
$utils = new DbUtils();

if(isset($_POST['email'])){
	$name = $_POST['name'];
	$firstName = $_POST['firstname'];
	$email = $_POST['email'];
	$apartmentid = $_POST['apartmentLink'];
	echo "$name $firstName $email $apartmentid";
	$success = DbUtils::setPersonInApartment($name, $firstName, $email, $apartmentid);
	if(!$success){
		$_SESSION['message'] = 'Account Already Exists';
    	header('location:../views/addPersonToApartment.php');
	}
	else{
		$_SESSION['AccountCreated'] = 'Account Created!';
		header('location:../views/profile.php');
	}
}
else{
	$_SESSION['message'] = 'You need to register first';
	header('location:../views/addPersonToApartment.php');
}
