<?php

class Device{
    private int $deviceid;
    public bool $state;
    private float $value;
    private int $roomid;   
    private int $devicetypeid;

    public function __construct($deviceid, $state, $value, $roomid, $devicetypeid){
        $this->deviceid = $deviceid;
        $this->state = $state;
        $this->value = $value;
        $this->roomid = $roomid;
        $this->devicetypeid = $devicetypeid;
    }

    private function writeDevice($state, $value, $roomid, $devicetypeid){
        return `INSERT INTO Device (State, Value, RoomID, DeviceTypeID)
        VALUES ("$state", "$value" , "$roomid", "$devicetypeid")`;
    }

    public function sendDeviceToDatabase($connection){
            return $connection->query($this->writeDevice($this->state, $this->value, $this->roomid, $this->devicetypeid));
    }


}

?>

