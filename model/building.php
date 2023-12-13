<?php

class Building{
    public int $buildingid;
    public string $name;
    public string $photo;
    private float $size;
    private string $address;

    public function __construct($buildingid, $name, $photo, $size, $address){
        $this->buildingid = $buildingid;
        $this->name = $name;
        $this->photo = $photo;
        $this->size = $size;
        $this->address = $address;
    }

    private function writeBuilding($name, $photo, $size, $address){
        return "INSERT INTO Building (Name, Photo, Size, Address)
        VALUES ('$name', '$photo', '$size' , '$address')";
    }

    public function sendBuildingToDatabase($connection){
            return $connection->query($this->writeBuilding($this->name, $this->photo, $this->size, $this->address));
    }

    public function getAddress(){
        return $this->address;
    }




}

?>

