<?php

class SensorType{
    private int $sensortypeid;
    public string $name;
    public string $unit;
    public string $photo;

    public function __construct($sensortypeid, $name, $unit, $photo){
        $this->sensortypeid = $sensortypeid;
        $this->name = $name;
        $this->unit = $unit;
        $this->photo = $photo;
    }

    private function writeSensorType($name, $unit, $photo){
        return `INSERT INTO DeviceType (Name, Unit, Photo)
        VALUES ("$name", "$unit","$photo")`;
    }

    public function sendSensorTypeToDatabase($connection){
            return $connection->query($this->writeSensorType($this->name, $this->unit, $this->photo));
    }


}

?>

