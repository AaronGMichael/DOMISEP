<?php
include_once('DbConnection.php');
include_once("Person.php");
include_once("../model/building.php");
include_once("../model/apartment.php");
include_once("../model/room.php");
class DbUtils extends DbConnection{

    private static function getUsersWhereUsername($username){
       return "SELECT * FROM Account WHERE username = '$username'";
    }

    public static function setUser($P){
        if(DbConnection::$connection->query(DbUtils::getUsersWhereUsername($P->username))->num_rows > 0){
            return 300;
        }
        else{
            return $P->sendUserToDatabase(DbConnection::$connection);
        }
    }

    public static function getUser($username){
        $userDetails = DbConnection::$connection->query(DbUtils::getUsersWhereUsername($username));
        if($userDetails->num_rows === 0) return false;
        $userDetails = $userDetails->fetch_object();
        $P = new Person($userDetails->AccountID, $userDetails->Username,$userDetails->HashPassword,$userDetails->AccessRights,$userDetails->Name, $userDetails->FirstName, $userDetails->Mail);
        return $P;
    }

    public static function getBuilding(){
        $buildingDetails = DbConnection::$connection->query("SELECT * FROM Building");  
        if($buildingDetails->num_rows === 0) return false;
        $buildings = array();
        while($building = $buildingDetails->fetch_object()){
            $buildings[] = new Building($building->BuildingID, $building->Name, $building->Photo, $building->Size, $building->Address);
        }
        return $buildings;
    }

    public static function getApartmentByAdmin($buildingid){
        $apartmentDetails = DbConnection::$connection->query("SELECT * FROM Apartment WHERE BuildingID = '$buildingid'");
        if($apartmentDetails->num_rows === 0) return false;
        $apartments = array();
        while($apartment = $apartmentDetails->fetch_object()){
            $apartments[] = new Apartment($apartment->ApartmentID,$apartment->Name,$apartment->Number,$apartment->NumberOfPeople,$apartment->BuildingID,$apartment->AccountID);
        }
        return $apartments;
    }

    public static function getBuildingName($buildingid){
        $buildingName = DbConnection::$connection->query("SELECT Name FROM Building WHERE BuildingID = '$buildingid'");
        return $buildingName->fetch_object()->Name;
    }

    public static function getApartmentByUser($accountid){
        $apartmentDetails = DbConnection::$connection->query("SELECT * FROM Apartment WHERE AccountID = '$accountid'");
        if($apartmentDetails->num_rows === 0) return false;
        $apartment = $apartmentDetails->fetch_object();
        $apartment = new Apartment($apartment->ApartmentID,$apartment->Name,$apartment->Number,$apartment->NumberOfPeople,$apartment->BuildingID,$apartment->AccountID);
        return $apartment;

    }

    public static function getRoomByAdmin($apartmentid){
        $roomDetails = DbConnection::$connection->query("SELECT * FROM Room WHERE ApartmentID = '$apartmentid'");
        if($roomDetails->num_rows === 0) return false;
        $rooms = array();
        while($room = $roomDetails->fetch_object()){
            $obj = new Room($room->RoomID,$room->Name,$room->ApartmentID);
            $obj->roomid = $room->RoomID;
            $rooms[] = $obj;
        }
        return $rooms;
    }

    public static function getApartmentName($apartmentid){
        $apartmentName = DbConnection::$connection->query("SELECT Name FROM Apartment WHERE ApartmentID = '$apartmentid'");
        return $apartmentName->fetch_object()->Name;
    }
   
    public static function getDeviceByAdmin($roomid){
        $deviceDetails = DbConnection::$connection->query("SELECT * FROM Device WHERE RoomID = '$roomid'");
        if($deviceDetails->num_rows === 0) return false;
        $devices = array();
        while($device = $deviceDetails->fetch_object()){
            $devices[] = new device($device->DeviceID,$device->Name,$device->State,$device->Value,$device->RoomID,$device->DeviceTypeID);
        }
        return $devices;
    }

    public static function getDeviceTypeByAdmin(){
        $devicetypeDetails = DbConnection::$connection->query("SELECT * FROM DeviceType");
        if($devicetypeDetails->num_rows === 0) return false;
        $devicetypes = array();
        while($devicetype = $devicetypeDetails->fetch_object()){
            $devicetypes[] = new DeviceType($devicetype->DeviceTypeID,$devicetype->Name,$devicetype->Unit);
        }
        return $devicetypes;
    }

    public static function getDeviceHistoryByAdmin($deviceid){
        $devicehistoryDetails = DbConnection::$connection->query("SELECT * FROM devicehistory WHERE DeviceID = '$deviceid'");
        if($devicehistoryDetails->num_rows === 0) return false;
        $devicehistories = array();
        while($devicehistory = $devicehistoryDetails->fetch_object()){
            $devicehistories[] = new DeviceHistory($devicehistory->DeviceHistoryID,$devicehistory->State,$devicehistory->Value,$devicehistory->DateTime,$devicehistory->DeviceID);
        }
        return $devicehistories;
    }

    public static function getSensorTypeByAdmin(){
        $sensortypeDetails = DbConnection::$connection->query("SELECT * FROM SensorType");
        if($sensortypeDetails->num_rows === 0) return false;
        $sensortypes = array();
        while($sensortype = $sensortypeDetails->fetch_object()){
            $sensortypes[] = new SensorType($sensortype->SensorTypeID,$sensortype->Name,$sensortype->Unit);
        }
        return $sensortypes;
    }

    public static function getSensorByAdmin($roomid){
        $sensorDetails = DbConnection::$connection->query("SELECT * FROM sensor WHERE RoomID = '$roomid'");
        if($sensorDetails->num_rows === 0) return false;
        $sensors = array();
        while($sensor = $sensorDetails->fetch_object()){
            $sensors[] = new Sensor($sensor->SensorID,$sensor->Name,$sensor->MiniValue,$sensor->MaxiValue,$sensor->RoomID,$sensor->SensorTypeID);
        }
        return $sensors;
    }

    public static function getMesurementByAdmin($sensorid){
        $mesurementDetails = DbConnection::$connection->query("SELECT * FROM Mesurement WHERE SensorID = '$sensorid'");
        if($mesurementDetails->num_rows === 0) return false;
        $mesurements = array();
        while($mesurement = $mesurementDetails->fetch_object()){
            $mesurements[] = new Mesurement($mesurement->MesurementID,$mesurement->Value,$mesurement->DateTime,$mesurement->SensorID);
        }
        return $mesurements;
    }
}
?>  