<?php

class Sensor{
    public int $sensorid;
    public string $name;
    public float $minivalue;
    private float $maxivalue;
    private int $roomid;   
    public int $sensortypeid;

    public function __construct($sensorid, $name, $minivalue, $maxivalue, $roomid, $sensortypeid){
        $this->sensorid = $sensorid;
        $this->name = $name;
        $this->minivalue = $minivalue;
        $this->maxivalue = $maxivalue;
        $this->roomid = $roomid;
        $this->sensortypeid = $sensortypeid;
    }

    private function writeSensor($name, $minivalue, $maxivalue, $roomid, $sensortypeid){
        return `INSERT INTO Sensor (Name, MiniValue, MaxiValue, RoomID, SensorTypeID)
        VALUES ("$name", "$minivalue", "$maxivalue" , "$roomid", "$sensortypeid")`;
    }

    public function sendSensorToDatabase($connection){
            return $connection->query($this->writeSensor($this->name, $this->minivalue, $this->maxivalue, $this->roomid, $this->sensortypeid));
    }


}

?>

