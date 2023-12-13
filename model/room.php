<?php

class Room{
    public int $roomid;
    public string $name; 
    public string $photo;
    private int $apartmentid;

    public function __construct($roomid, $name, $photo, $apartmentid){
        $this->apartmentid = $roomid;
        $this->name = $name;
        $this->photo = $photo;
        $this->apartmentid = $apartmentid;
    }

    private function writeRoom($name, $photo, $apartmentid){
        return "INSERT INTO Room (Name, Photo, ApartmentID)
        VALUES (\"$name\", \"$photo\", \"$apartmentid\")";
    }

    public function sendRoomToDatabase($connection){
            return $connection->query($this->writeRoom($this->name, $this->photo, $this->apartmentid));
    }

    public function getId(){
        return $this->roomid;   
    }

}

?>

