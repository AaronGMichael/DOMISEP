<?php

class SensorType{
    private int $sensortypeid;
    public string $name;
    public string $unit;

    public function __construct($sensortypeid, $name, $unit){
        $this->sensortypeid = $sensortypeid;
        $this->name = $name;
        $this->unit = $unit;
    }

    private function writeSensorType($name, $unit){
        return `INSERT INTO DeviceType (Name, Unit)
        VALUES ("$name", "$unit")`;
    }

    public function sendSensorTypeToDatabase($connection){
            return $connection->query($this->writeSensorType($this->name, $this->unit));
    }


}

?>

