<?php
header('Content-Type: application/json');
include_once('DbUtils.php');

$utils = new DBUtils();

$measurements = DbUtils::getWaterHistory($_POST["apartment"]);
$data = array();
foreach ($measurements as $row) {
	$data[] = $row;
}


echo json_encode(count($data)>0 ? $data : "empty");

?>