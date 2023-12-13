<?php

class DeviceType{
    private int $devicetypeid;
    public string $name;
    public string $unit;
    public string $photo;

    public function __construct($deviceid, $name, $unit, $photo){
        $this->devicetypeid = $deviceid;
        $this->name = $name;
        $this->unit = $unit;
        $this->photo = $photo;
    }

    private function writeDeviceType($name, $unit, $photo){
        return "INSERT INTO DeviceType (Name, Unit, Photo)
        VALUES (\"$name\", \"$unit\", \"$photo\")";
    }

    public function sendDeviceTypeToDatabase($connection){
            return $connection->query($this->writeDeviceType($this->name, $this->unit, $this->photo));
    }


}

?>

