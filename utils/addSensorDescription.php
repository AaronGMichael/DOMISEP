<?php
include_once('DbUtils.php');
$utils = new DbUtils();
$_POST = json_decode(file_get_contents('php://input'), true);
print_r($_POST);

return json_encode(DbUtils::addSensorDescription($_POST["id"], $_POST["text"]));

