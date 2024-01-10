<?php
header('Content-Type: application/json');
include_once('DbUtils.php');

$utils = new DBUtils();

if($_POST["type"]=="water")$measurements = DbUtils::getWaterHistory($_POST["apartment"]);
else $measurements = DbUtils::getElectricityHistory($_POST["apartment"]);
$data = array();
foreach ($measurements as $row) {
	$data[] = $row;
}


echo json_encode(count($data)>0 ? $data : "empty");

?>