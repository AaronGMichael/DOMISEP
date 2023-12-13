<?php
//start session
session_start();

include_once('../model/room.php');
include_once('DbUtils.php');
 
// $building = new Building();
 
if(isset($_POST['roomname'])){
	$name = $_POST['roomname'];
	$photo = strlen($_POST['apartmentphoto']) > 1 ? $_POST['apartmentphoto'] : "https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg";  
    $apartmentid = $_POST['apartmentID'];
	$p = new Room(100, $name, $photo, $apartmentid);
    $utils = new DBUtils();
	$success = DBUtils::setRoom($p);
//     debug_to_console($success);
	if(!$success){
		$_SESSION['message'] = 'Room Already Exists';
    	header("location:../views/addroom.php?id=$apartmentid");
	}
	else{
		$_SESSION['AccountCreated'] = 'Room Created!';
		header("location:../views/apartment.php?id=$apartmentid");
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header('location:../views/addapartment.php');
}
?>