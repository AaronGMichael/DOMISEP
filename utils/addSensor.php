<?php
//start session
session_start();

include_once('../model/sensor.php');
include_once('DbUtils.php');
$fallback = $_POST['roomID'];
if(isset($_POST['name'])){
	$name = $_POST['name'];
    $sensorType = $_POST['sensortype'];
    $min = $_POST['minvalue'];
    $max = $_POST['maxvalue'];
    $room = $_POST['roomID'];
	$p = new Sensor(100, $name, $min, $max, $room, $sensorType);
    $utils = new DBUtils();
	$success = DBUtils::setNewSensor($p);
	if(!$success){
		$_SESSION['message'] = $success;
    	header("location:../views/addsensor.php?id=$room");
	}
	else{
		$_SESSION['AccountCreated'] = 'Sensor Created!';
		header("location:../views/room.php?id=$room");
	}
}
else{
	$_SESSION['message'] = 'Something went wrong';
	header("location:../views/addsensor.php?id=$fallback");
}
?>