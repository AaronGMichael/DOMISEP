<?php
//start session
session_start();

include_once('../model/building.php');
include_once('DbUtils.php');
 
// $building = new Building();
 
if(isset($_POST['building'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$photo = $_POST['photo'];
    $size = $_POST['size'];
	$p = new Building(100, $name, $photo, $size, $address);
    $utils = new DBUtils();
	$success = DBUtils::setBuilding($p);
    debug_to_console($success);
	if(!$success){
		$_SESSION['message'] = 'Building Already Exists';
    	header('location:../views/addbuilding.php');
	}
	else{
		$_SESSION['AccountCreated'] = 'Account Created!';
		header('location:../views/home.php');
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header('location:../views/addbuilding.php');
}
?>