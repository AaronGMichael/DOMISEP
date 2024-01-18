<?php
session_start();
include_once('../model/message.php');
include_once('DbUtils.php');

if(isset($_POST['message'])){
$message = $_POST['message'];
$account = $_POST['userid'];
$date = date('m/d/Y h:i:s a', time());
$p = new Message(1, $message, $account, $date);
    $utils = new DBUtils();
	$success = DBUtils::setMessage($p);
//     debug_to_console($success);
	if($success){
		$_SESSION['msg'] = 'Message sent!';
		$_SESSION['welcome'] = "Your massage has been sent, thank you!";
		header("location:../views/profile.php");
	}
	else{
		$_SESSION['MessagesSent'] = 'Something went wrong';
	header('location:../views/sendHelp.php');
	}}
else{
	$_SESSION['msg'] = 'Something went wrong';
	header('location:../views/sendHelp.php');
}
?>

