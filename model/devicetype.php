<?php

class DeviceType{
    private int $devicetypeid;
    public string $name;
    public string $unit;

    public function __construct($deviceid, $name, $unit){
        $this->devicetypeid = $deviceid;
        $this->name = $name;
        $this->unit = $unit;
    }

    private function writeDeviceType($name, $unit){
        return `INSERT INTO DeviceType (Name, Unit)
        VALUES ("$name", "$unit")`;
    }

    public function sendDeviceTypeToDatabase($connection){
            return $connection->query($this->writeDeviceType($this->name, $this->unit));
    }


}

?>

