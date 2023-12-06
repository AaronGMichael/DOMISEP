<?php

class Device{
    private int $deviceid;
    public string $name;
    public bool $state;
    private float $value;
    private int $roomid;   
    private int $devicetypeid;

    public function __construct($deviceid, $name, $state, $value, $roomid, $devicetypeid){
        $this->deviceid = $deviceid;
        $this->name = $name;
        $this->state = $state;
        $this->value = $value;
        $this->roomid = $roomid;
        $this->devicetypeid = $devicetypeid;
    }

    private function writeDevice($name, $state, $value, $roomid, $devicetypeid){
        return `INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
        VALUES ("$name", "$state", "$value" , "$roomid", "$devicetypeid")`;
    }

    public function sendDeviceToDatabase($connection){
            return $connection->query($this->writeDevice($this->name, $this->state, $this->value, $this->roomid, $this->devicetypeid));
    }


}

?>

