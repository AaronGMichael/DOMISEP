<?php

class Device
{
    public int $deviceid;
    public string $name;
    public bool $state;
    private float $value;
    private int $roomid;
    public int $devicetypeid;

    public function __construct($deviceid, $name, $state, $value, $roomid, $devicetypeid)
    {
        $this->deviceid = $deviceid;
        $this->name = $name;
        $this->state = $state;
        $this->value = $value;
        $this->roomid = $roomid;
        $this->devicetypeid = $devicetypeid;
    }

    private function writeDevice($name, $state, $value, $roomid, $devicetypeid)
    {
        return "INSERT INTO Device (Name, State, Value, RoomID, DeviceTypeID)
        VALUES (\"$name\", \"$state\", \"$value\" , \"$roomid\", \"$devicetypeid\")";
    }

    public function sendDeviceToDatabase($connection)
    {
        return $connection->query($this->writeDevice($this->name, $this->state, $this->value, $this->roomid, $this->devicetypeid));
    }

    public function getState()
    {
        if ($this->state == 1) return "ON";
        else if ($this->state == 0) return "OFF";
    }
}
