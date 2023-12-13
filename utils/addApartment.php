<?php
//start session
session_start();

include_once('../model/apartment.php');
include_once('DbUtils.php');
 
// $building = new Building();
 
if(isset($_POST['apartmentname'])){
	$name = $_POST['apartmentname'];
	// $photo = $_POST['photo'];
    $number = $_POST['number'];
    $numberofpeople = $_POST['numberofpeople'];
    $accountid = $_POST['userID'];
    $buildingid = $_POST['buildingID'];
	$p = new Apartment(100, $name, $number, $numberofpeople, $buildingid, $accountid);
    $utils = new DBUtils();
	$success = DBUtils::setApartment($p);
//     debug_to_console($success);
	if(!$success){
		$_SESSION['message'] = 'Apartment Already Exists';
    	header('location:../views/addbuilding.php');
	}
	else{
		$_SESSION['AccountCreated'] = 'Apartment Created!';
		header("location:../views/building.php?id=$buildingid");
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header('location:../views/addapartment.php');
}
?>