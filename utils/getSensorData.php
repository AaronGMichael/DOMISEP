<?php
header('Content-Type: application/json');
include_once('DbUtils.php');

$utils = new DBUtils();

$measurements = DbUtils::getMesurementByAdmin(21);

$data = array();
foreach ($measurements as $row) {
	$data[] = $row;
}


echo json_encode($data);
?>