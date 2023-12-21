<?php
//start session
session_start();

include_once('../model/building.php');
include_once('DbUtils.php');
 
// $building = new Building();
 
if(isset($_POST['building'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$photo = strlen($_POST['photo']) > 1 ? $_POST['photo'] : "https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg";;
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
		$_SESSION['AccountCreated'] = 'Building Created!';
		header('location:../views/home.php');
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header('location:../views/addbuilding.php');
}
?>