<?php
    include 'DbUtils.php';
    $utils = new DbUtils();
    $_POST = json_decode(file_get_contents('php://input'), true);
    $deviceid = $_POST['id'];
    $state = $_POST['state'];
    return json_encode(DbUtils::switchDevice($deviceid, $state));
?>