<?php

class Apartment{
    private int $apartmentid;
    public string $name;
    public int $number;
    private int $numberofpeople;
    private int $buildingid;   
    private int $accountid;

    public function __construct($apartmentid, $name, $number, $numberofpeople, $buildingid, $accountid){
        $this->apartmentid = $apartmentid;
        $this->name = $name;
        $this->number = $number;
        $this->numberofpeople = $numberofpeople;
        $this->buildingid = $buildingid;
        $this->accountid = $accountid;
    }

    private function writeApartment($name, $number, $numberofpeople, $buildingid, $accountid){
        return "INSERT INTO Apartment (Name, Number, NumberOfPeople, BuildingID, AccountID)
        VALUES (\"$name\", \"$number\", \"$numberofpeople\" , \"$buildingid\", \"$accountid\")";
    }

    public function sendApartmentToDatabase($connection){
            return $connection->query($this->writeApartment($this->name, $this->number, $this->numberofpeople, $this->buildingid, $this->accountid));
    }

    public function validAccess($User){
        if($User->isAdmin() || $User->isOwner()){
            return true;
        } else if($User->id == $this->accountid){
            return true;
        } else return false;
    }

    public function getId(){
        return $this->apartmentid;
    }

    public function getBuildingId(){
        return $this->buildingid;
    }

}
?>


