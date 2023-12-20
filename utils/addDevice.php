<?php
session_start();

include_once('../model/device.php');
include_once('DbUtils.php');
$fallback = $_POST['roomID'];
if (isset($_POST['devicename'])) {
    $name = $_POST['devicename'];
    $sensorType = $_POST['devicetype'];
    $value = $_POST['devicevalue'];
    $room = $_POST['roomID'];
    $state = $_POST['devicestate'];
    $p = new Device(100, $name, $state, $value, $room, $sensorType);
    $utils = new DBUtils();
    $success = DBUtils::setNewDevice($p);
    if (!$success) {
        $_SESSION['message'] = $success;
        header("location:../views/adddevice.php?id=$room");
    } else {
        $_SESSION['AccountCreated'] = 'Device Created!';
        header("location:../views/room.php?id=$room");
    }
} else {
    $_SESSION['message'] = 'Something went wrong';
    header("location:../views/adddevice.php?id=$fallback");
}
