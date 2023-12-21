<?php
//start session
session_start();

include_once('../model/devicetype.php');
include_once('DbUtils.php');

if (isset($_POST['devicetypename'])) {
    $name = $_POST['devicetypename'];
    $photo = strlen($_POST['devicetypeicon']) > 2 ? $_POST['devicetypeicon'] : "../assets/icons/deviceType.png";
    $unit = $_POST["devicetypeunit"];
    $p = new DeviceType(100, $name, $unit, $photo);
    $utils = new DBUtils();
    $success = DBUtils::setDeviceType($p);
    if (!$success) {
        $_SESSION['message'] = $success;
        header("location:../views/addDeviceType.php");
    } else {
        $_SESSION['AccountCreated'] = 'Device Type Created!';
        header("location:../views/home.php");
    }
} else {
    $_SESSION['message'] = 'Something went wrong';
    header('location:../views/adddevicetype.php');
}
