<?php

class Sensor{
    private int $sensorid;
    public float $minivalue;
    private float $maxivalue;
    private int $roomid;   
    private int $sensortypeid;

    public function __construct($sensorid, $minivalue, $maxivalue, $roomid, $sensortypeid){
        $this->sensorid = $sensorid;
        $this->minivalue = $minivalue;
        $this->maxivalue = $maxivalue;
        $this->roomid = $roomid;
        $this->sensortypeid = $sensortypeid;
    }

    private function writeSensor($minivalue, $maxivalue, $roomid, $sensortypeid){
        return `INSERT INTO Sensor (MiniValue, MaxiValue, RoomID, SensorTypeID)
        VALUES ("$minivalue", "$maxivalue" , "$roomid", "$sensortypeid")`;
    }

    public function sendSensorToDatabase($connection){
            return $connection->query($this->writeSensor($this->minivalue, $this->maxivalue, $this->roomid, $this->sensortypeid));
    }


}

?>

