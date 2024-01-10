<?php
header('Content-Type: application/json');
include_once('DbUtils.php');

$utils = new DBUtils();

if($_POST["type"]=="water")$measurements = DbUtils::getWaterBuildingHistory($_POST["building"]);
else $measurements = DbUtils::getElectricityBuildingHistory($_POST["building"]);
$data = array();
foreach ($measurements as $row) {
	$data[] = $row;
}


echo json_encode(count($data)>0 ? $data : "empty");

?>