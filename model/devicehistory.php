<?php

class DeviceHistory{
    private int $devicehistoryid;
    private string $state;
    private string $value;
    private string $datetime;
    private string $deviceid;


    public function __construct($devicehistoryid, $state, $value, $datetime, $deviceid){
        $this->devicehistoryid = $devicehistoryid;
        $this->state = $state;
        $this->value = $value;
        $this->datetime = $datetime;
        $this->deviceid = $deviceid;
    }

    private function writeDeviceHistory($state, $value, $datetime, $deviceid){
        return `INSERT INTO DeviceHistory (State, Value, DateTime, DeviceID)
        VALUES ("$state", "$value", "$datetime","$deviceid")`;
    }

    public function sendDeviceHistoryToDatabase($connection){
            return $connection->query($this->writeDeviceHistory($this->state, $this->value, $this->datetime, $this->deviceid));
    }


}

?>

