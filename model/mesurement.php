<?php

class Mesurement{
    private int $mesurementid;
    public float $value;
    public string $datetime;
    private int $sensorid;

    public function __construct($mesurementid, $value, $datetime, $sensorid){
        $this->mesurementid = $mesurementid;
        $this->value = $value;
        $this->datetime = $datetime;
        $this->sensorid = $sensorid;
    }

    private function writeMesurement($value, $datetime, $sensorid){
        return `INSERT INTO Mesurement (Value, DateTime, SensorID)
        VALUES ("$value", "$datetime", "$sensorid")`;
    }

    public function sendMesurementToDatabase($connection){
            return $connection->query($this->writeMesurement($this->value, $this->datetime, $this->sensorid));
    }


}

?>