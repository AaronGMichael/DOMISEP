<?php

class DeviceHistory{
    private int $devicetypeid;
    private string $name;
    private string $unit;
    private string $datetime;


    public function __construct($deviceid, $name, $unit, $datetime){
        $this->devicetypeid = $deviceid;
        $this->name = $name;
        $this->unit = $unit;
        $this->datetime = $datetime;
    }

    private function writeDeviceHistory($name, $unit, $datetime){
        return `INSERT INTO DeviceHistory (Name, Unit, DateTime)
        VALUES ("$name", "$unit", "$datetime")`;
    }

    public function sendDeviceHistoryToDatabase($connection){
            return $connection->query($this->writeDeviceHistory($this->name, $this->unit, $this->datetime));
    }


}

?>

