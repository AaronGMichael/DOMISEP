<?php
//start session
session_start();

include_once('../model/sensortype.php');
include_once('DbUtils.php');
 
if(isset($_POST['sensorname'])){
	$name = $_POST['sensorname'];
	$photo = strlen($_POST['sensorIcon']) > 2 ? $_POST['sensorIcon'] : "../assets/icons/sensor.png";  
    $unit = $_POST["unit"];
	$p = new SensorType(100, $name, $unit, $photo);
    $utils = new DBUtils();
	$success = DBUtils::setSensorType($p);
	if(!$success){
		$_SESSION['message'] = $success;
    	header("location:../views/addsensortype.php");
	}
	else{
		$_SESSION['AccountCreated'] = 'Sensor Created!';
		header("location:../views/apartment.php?id=$apartmentid");
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header('location:../views/addsensortype.php');
}
?>