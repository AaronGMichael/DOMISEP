<?php

class Room{
    private int $roomid;
    public string $name; 
    private int $apartmentid;

    public function __construct($roomid, $name, $apartmentid){
        $this->apartmentid = $roomid;
        $this->name = $name;
        $this->apartmentid = $apartmentid;
    }

    private function writeRoom($name, $apartmentid){
        return `INSERT INTO Room (Name, ApartmentID)
        VALUES ("$name", "$apartmentid")`;
    }

    public function sendRoomToDatabase($connection){
            return $connection->query($this->writeRoom($this->name, $this->apartmentid));
    }


}

?>

