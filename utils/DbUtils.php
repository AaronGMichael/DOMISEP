<?php
include_once('DbConnection.php');
include_once("Person.php");
include_once("../model/building.php");
include_once("../model/apartment.php");
include_once("../model/room.php");
include_once("../model/device.php");
include_once("../model/devicetype.php");
include_once("../model/sensor.php");
include_once("../model/sensortype.php");
include_once("../model/mesurement.php");
include_once("../model/message.php");
class DbUtils extends DbConnection
{

    private static function getUsersWhereUsername($username)
    {
        return "SELECT * FROM Account WHERE username = '$username'";
    }
    private static function getBuildingWhereName($name)
    {
        return "SELECT * FROM Building WHERE Name = '$name'";
    }

    private static function getUserWhereID($userid)
    {
        return "SELECT * FROM Account WHERE AccountID = '$userid'";
    }

    private static function getUsers()
    {
        return "SELECT AccountID as id, Username, FirstName, Name from account where AccessRights = 101;";
    }

    private static function getSensorTypeWhereUnit($name, $unit)
    {
        return "SELECT * from SensorType where Name = \"$name\" AND Unit = \"$unit\";";
    }

    public static function setUser($P)
    {
        if (DbConnection::$connection->query(DbUtils::getUsersWhereUsername($P->username))->num_rows > 0) {
            return 300;
        } else {
            return $P->sendUserToDatabase(DbConnection::$connection);
        }
    }

    public static function getUserIDs()
    {
        $userDetails = DbConnection::$connection->query(DbUtils::getUsers());
        if ($userDetails->num_rows === 0) return false;
        $userList = array();
        while ($user = $userDetails->fetch_object()) {
            $userList[] = [
                "id" => $user->id,
                "name" => $user->Name,
                "firstName" => $user->FirstName,
                "username" => $user->Username,
            ];
        }
        return $userList;
    }

    public static function getSensorTypes()
    {
        $userDetails = DbConnection::$connection->query("SELECT SensorTypeID as id, Name, Unit FROM sensortype;");
        if ($userDetails->num_rows === 0) return false;
        $sensorTypeList = array();
        while ($user = $userDetails->fetch_object()) {
            $sensorTypeList[] = [
                "id" => $user->id,
                "name" => $user->Name,
                "unit" => $user->Unit,
            ];
        }
        return $sensorTypeList;
    }

    public static function setBuilding($P)
    {
        if (DbConnection::$connection->query(DbUtils::getBuildingWhereName($P->name))->num_rows > 0) {
            return 300;
        } else {
            return $P->sendBuildingToDatabase(DbConnection::$connection);
        }
    }

    public static function setApartment($P)
    {
        return $P->sendApartmentToDatabase(DbConnection::$connection);
    }

    public static function setRoom($P)
    {
        return $P->sendRoomToDatabase(DbConnection::$connection);
    }

    public static function setSensorType($P)
    {
        if (DbConnection::$connection->query(DbUtils::getSensorTypeWhereUnit($P->name, $P->unit))->num_rows > 0) {
            return 300;
        } else {
            return $P->sendSensorTypeToDatabase(DbConnection::$connection);
        }
    }

    public static function setNewDevice($P)
    {
        return $P->sendDeviceToDatabase(DbConnection::$connection);
    }

    public static function setDeviceType($P)
    {
        return $P->sendDeviceTypeToDatabase(DbConnection::$connection);
    }

    public static function setNewSensor($P)
    {
        return $P->sendSensorToDatabase(DbConnection::$connection);
    }

    public static function setMessage($P)
    {
        return $P->sendMessageToDatabase(DbConnection::$connection);
    }

    public static function getUser($username)
    {
        $userDetails = DbConnection::$connection->query(DbUtils::getUsersWhereUsername($username));
        if ($userDetails->num_rows === 0) return false;
        $userDetails = $userDetails->fetch_object();
        $P = new Person($userDetails->AccountID, $userDetails->Username, $userDetails->HashPassword, $userDetails->AccessRights, $userDetails->Name, $userDetails->FirstName, $userDetails->Mail);
        return $P;
    }
    public static function getUserOnID($userid)
    {
        $userDetails = DbConnection::$connection->query(DbUtils::getUserWhereID($userid));
        if ($userDetails->num_rows === 0) return false;
        $userDetails = $userDetails->fetch_object();
        $P = new Person($userDetails->AccountID, $userDetails->Username, $userDetails->HashPassword, $userDetails->AccessRights, $userDetails->Name, $userDetails->FirstName, $userDetails->Mail);
        return $P;
    }

    public static function getBuilding()
    {
        $buildingDetails = DbConnection::$connection->query("SELECT * FROM Building");
        if ($buildingDetails->num_rows === 0) return false;
        $buildings = array();
        while ($building = $buildingDetails->fetch_object()) {
            $buildings[] = new Building($building->BuildingID, $building->Name, $building->Photo, $building->Size, $building->Address);
        }
        return $buildings;
    }

    public static function searchBuilding($term){
        $buildingDetails = DbConnection::$connection->query("SELECT * FROM Building WHERE LOWER(Name) LIKE '%$term%'");
        if ($buildingDetails->num_rows === 0) return [];
        $buildings = array();
        while ($building = $buildingDetails->fetch_object()) {
            $buildings[] = new Building($building->BuildingID, $building->Name, $building->Photo, $building->Size, $building->Address);
        }
        return $buildings;
    }

    public static function getApartmentByAdmin($buildingid)
    {
        $apartmentDetails = DbConnection::$connection->query("SELECT * FROM Apartment WHERE BuildingID = '$buildingid'");
        if ($apartmentDetails->num_rows === 0) return false;
        $apartments = array();
        while ($apartment = $apartmentDetails->fetch_object()) {
            $apartments[] = new Apartment($apartment->ApartmentID, $apartment->Name, $apartment->Number, $apartment->NumberOfPeople, $apartment->Photo, $apartment->BuildingID, $apartment->AccountID);
        }
        return $apartments;
    }

    public static function getAllBuildingApartments(){
        $apartmentDetails = DbConnection::$connection->query("SELECT apartment.*,building.Name AS BuildingName FROM apartment INNER JOIN building ON apartment.BuildingID = building.BuildingID;");
        if ($apartmentDetails->num_rows === 0) return false;
        $apartments = array();
        while ($apartment = $apartmentDetails->fetch_object()) {
            $apart = new Apartment($apartment->ApartmentID, $apartment->Name, $apartment->Number, $apartment->NumberOfPeople, $apartment->Photo, $apartment->BuildingID, $apartment->AccountID);
            $apart->buildingName = $apartment->BuildingName;
            $apartments[] = $apart;
        }
        return $apartments;
    }

    public static function getBuildingName($buildingid)
    {
        $buildingName = DbConnection::$connection->query("SELECT Name FROM Building WHERE BuildingID = '$buildingid'");
        return $buildingName->fetch_object()->Name;
    }

    public static function getApartmentByUser($accountid)
    {
        $apartmentDetails = DbConnection::$connection->query("SELECT * FROM Apartment WHERE AccountID = '$accountid'");
        if ($apartmentDetails->num_rows === 0) return false;
        $apartment = $apartmentDetails->fetch_object();
        $apartment = new Apartment($apartment->ApartmentID, $apartment->Name, $apartment->Number, $apartment->NumberOfPeople, $apartment->Photo, $apartment->BuildingID, $apartment->AccountID);
        return $apartment;
    }

    public static function getRoomByAdmin($apartmentid)
    {
        $roomDetails = DbConnection::$connection->query("SELECT * FROM Room WHERE ApartmentID = '$apartmentid'");
        if ($roomDetails->num_rows === 0) return false;
        $rooms = array();
        while ($room = $roomDetails->fetch_object()) {
            $obj = new Room($room->RoomID, $room->Name, $room->Photo, $room->ApartmentID);
            $obj->roomid = $room->RoomID;
            $rooms[] = $obj;
        }
        return $rooms;
    }

    public static function getApartmentName($apartmentid)
    {
        $apartmentName = DbConnection::$connection->query("SELECT Name FROM Apartment WHERE ApartmentID = '$apartmentid'");
        return $apartmentName->fetch_object()->Name;
    }

    public static function getRoomName($roomid)
    {
        $roomName = DbConnection::$connection->query("SELECT Name FROM Room WHERE RoomID = '$roomid'");
        return $roomName->fetch_object()->Name;
    }

    public static function getDeviceByAdmin($roomid)
    {
        $deviceDetails = DbConnection::$connection->query("SELECT * FROM Device WHERE RoomID = '$roomid'");
        if ($deviceDetails->num_rows === 0) return false;
        $devices = array();
        while ($device = $deviceDetails->fetch_object()) {
            $obj = new Device($device->DeviceID, $device->Name, $device->State, $device->Value, $device->RoomID, $device->DeviceTypeID);
            $obj->deviceid = $device->DeviceID;
            $devices[] = $obj;
        }
        return $devices;
    }

    public static function switchDevice($deviceid, $state){
        return DbConnection::$connection->query("UPDATE Device SET STATE = '$state' WHERE DeviceID = '$deviceid'");
    }

    public static function getDeviceType($devicetypeid)
    {
        $devicetypeDetails = DbConnection::$connection->query("SELECT * FROM DeviceType WHERE DeviceTypeID = '$devicetypeid'");
        $devicetype = $devicetypeDetails->fetch_object();
        $obj = new DeviceType($devicetype->DeviceTypeID, $devicetype->Name, $devicetype->Unit, $devicetype->Photo);
        return $obj;
    }



    public static function getDeviceTypeByAdmin()
    {
        $devicetypeDetails = DbConnection::$connection->query("SELECT * FROM DeviceType");
        if ($devicetypeDetails->num_rows === 0) return false;
        $devicetypes = array();
        while ($devicetype = $devicetypeDetails->fetch_object()) {
            $devicetypes[] = new DeviceType($devicetype->DeviceTypeID, $devicetype->Name, $devicetype->Unit, $devicetype->Photo);
        }
        return $devicetypes;
    }

    public static function getDeviceHistoryByAdmin($deviceid)
    {
        $devicehistoryDetails = DbConnection::$connection->query("SELECT * FROM devicehistory WHERE DeviceID = '$deviceid'");
        if ($devicehistoryDetails->num_rows === 0) return false;
        $devicehistories = array();
        while ($devicehistory = $devicehistoryDetails->fetch_object()) {
            $devicehistories[] = new DeviceHistory($devicehistory->DeviceHistoryID, $devicehistory->State, $devicehistory->Value, $devicehistory->DateTime, $devicehistory->DeviceID);
        }
        return $devicehistories;
    }

    public static function getSensorTypeByAdmin()
    {
        $sensortypeDetails = DbConnection::$connection->query("SELECT * FROM SensorType");
        if ($sensortypeDetails->num_rows === 0) return false;
        $sensortypes = array();
        while ($sensortype = $sensortypeDetails->fetch_object()) {
            $sensortypes[] = new SensorType($sensortype->SensorTypeID, $sensortype->Name, $sensortype->Unit, $sensortype->Photo);
        }
        return $sensortypes;
    }

    public static function getSensorByAdmin($roomid)
    {
        $sensorDetails = DbConnection::$connection->query("SELECT * FROM Sensor WHERE RoomID = '$roomid'");
        if ($sensorDetails->num_rows === 0) return false;
        $sensors = array();
        while ($sensor = $sensorDetails->fetch_object()) {
            $result = new Sensor($sensor->SensorID, $sensor->Name, $sensor->MiniValue, $sensor->MaxiValue, $sensor->RoomID, $sensor->SensorTypeID);
            $result->desc = DbUtils::getSensorDescription($sensor->SensorID);
            $sensors[] = $result;
        }
        return $sensors;
    }

    public static function getSensorType($sensortypeid)
    {
        $sensortypeDetails = DbConnection::$connection->query("SELECT * FROM SensorType WHERE SensorTypeID = '$sensortypeid'");
        $sensortype = $sensortypeDetails->fetch_object();
        $obj = new DeviceType($sensortype->SensorTypeID, $sensortype->Name, $sensortype->Unit, $sensortype->Photo);
        return $obj;
    }

    public static function getSensorType1($sensorid){
        $sensorDetails = DbConnection::$connection->query("SELECT * FROM SensorType WHERE SensorTypeID = (SELECT SensorTypeID FROM Sensor WHERE SensorID = '$sensorid')");
        $sensortype = $sensorDetails->fetch_object();
            $obj = new DeviceType($sensortype->SensorTypeID,$sensortype->Name,$sensortype->Unit, $sensortype->Photo);
        return $obj;
    }

    public static function getMesurementByAdmin($sensorid){
        $mesurementDetails = DbConnection::$connection->query("SELECT * FROM Mesurement WHERE SensorID = '$sensorid' ORDER BY DateTime");
        if($mesurementDetails->num_rows === 0) return false;
        $mesurements = array();
        while ($mesurement = $mesurementDetails->fetch_object()) {
            $mesurements[] = new Mesurement($mesurement->MesurementID, $mesurement->Value, $mesurement->DateTime, $mesurement->SensorID);
        }
        return $mesurements;
    }

    public static function getLatestMesurement($sensorid)
    {
        $mesurementDetails = DbConnection::$connection->query("SELECT * FROM Mesurement WHERE SensorID = '$sensorid' AND DateTime = (SELECT MAX(DateTime) FROM Mesurement WHERE SensorID = '$sensorid')");
        if ($mesurementDetails->num_rows === 0) return NULL;
        $mesurement = $mesurementDetails->fetch_object();
        $obj = new Mesurement($mesurement->MesurementID, $mesurement->Value, $mesurement->DateTime, $mesurement->SensorID);
        return $obj;
    }

    public static function sumUpElectricity($apartmentid){
        $sum = DbConnection::$connection->query("SELECT SUM(Value) FROM DeviceHistory WHERE DeviceID IN (SELECT DeviceID FROM Device WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID = '$apartmentid') AND DeviceTypeID IN (3, 4, 5))AND DateTime >= DATE_SUB(NOW(),INTERVAL 1 YEAR)");
        if($sum->num_rows === 0) return "No data";
        $mesurement = $sum->fetch_row();
        
        return $mesurement[0];
}

public static function sumUpWater($apartmentid){
    $sum = DbConnection::$connection->query("SELECT SUM(Value) FROM Mesurement WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID = '$apartmentid') AND SensorTypeID = 3)AND DateTime >= DATE_SUB(NOW(),INTERVAL 1 MONTH)");
    if($sum->num_rows === 0) return "No data";
    $mesurement = $sum->fetch_row();
    
    return $mesurement[0];
}

public static function getWaterHistory($apartmentid){
    if($apartmentid === "mean") $result = DbConnection::$connection->query("SELECT AVG(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM Mesurement WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID IN (SELECT RoomID FROM Room ORDER BY ApartmentID) AND SensorTypeID = 3) GROUP BY CAST(DateTime AS DATE);");
    else $result = DbConnection::$connection->query("SELECT Value, DateTime FROM Mesurement WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID = '$apartmentid') AND SensorTypeID = 3) ORDER BY DateTime");
    if($result->num_rows === 0) return "No data";
    return $result;
}

public static function getElectricityHistory($apartmentid){
    if($apartmentid === "mean") $result = DbConnection::$connection->query("SELECT AVG(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM DeviceHistory WHERE DeviceID IN (SELECT DeviceID FROM Device WHERE RoomID IN (SELECT RoomID FROM Room ORDER By apartmentid) AND DeviceTypeID IN (3, 4, 5)) GROUP BY CAST(DateTime AS DATE);");
    else $result = DbConnection::$connection->query("SELECT Value, DateTime FROM DeviceHistory WHERE DeviceID IN (SELECT DeviceID FROM Device WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID = '$apartmentid') AND DeviceTypeID IN (3, 4, 5)) ORDER BY DateTime");
    if($result->num_rows === 0) return "No data";
    return $result;
}

public static function sumUpElectricityBuilding($buildingid){
    $apartments = DbUtils::getApartmentByAdmin($buildingid);
    $value = 0;
    if(isset($apartments[0]))foreach($apartments as $apartment){
        if(DbUtils::sumUpElectricity($apartment->apartmentid) != "No data") $value += (float)DbUtils::sumUpElectricity($apartment->apartmentid);
    }
    
    return $value;
}

public static function sumUpWaterBuilding($buildingid){
$apartments = DbUtils::getApartmentByAdmin($buildingid);
$value = 0;
if(isset($apartments[0]))foreach($apartments as $apartment){
        if(DbUtils::sumUpWater($apartment->apartmentid) != "No data") $value += (float)DbUtils::sumUpWater($apartment->apartmentid);
    }

return $value;
}

public static function getWaterBuildingHistory($buildingid){
    if($buildingid === "mean") $result =  DbConnection::$connection->query("SELECT AVG(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM Mesurement WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID IN (SELECT ApartmentID FROM apartment)) AND SensorTypeID = 3) GROUP BY CAST(DateTime AS DATE);");
    else $result = DbConnection::$connection->query("SELECT SUM(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM Mesurement WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID IN (SELECT ApartmentID FROM apartment WHERE BuildingID = \"$buildingid\")) AND SensorTypeID = 3) GROUP BY CAST(DateTime AS DATE);");
    if($result->num_rows === 0) return "No data";
    return $result;
}

public static function getElectricityBuildingHistory($buildingid){
    if($buildingid === "mean") $result = DbConnection::$connection->query("SELECT AVG(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM DeviceHistory WHERE DeviceID IN (SELECT DeviceID FROM Device WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID IN (SELECT ApartmentID FROM apartment)) AND DeviceTypeID IN (3, 4, 5)) GROUP BY CAST(DateTime AS DATE);");
    else $result = DbConnection::$connection->query("SELECT SUM(Value) AS Value, CAST(CAST(DateTime AS DATE) AS datetime) AS DateTime FROM DeviceHistory WHERE DeviceID IN (SELECT DeviceID FROM Device WHERE RoomID IN (SELECT RoomID FROM Room WHERE ApartmentID IN (SELECT ApartmentID FROM apartment WHERE BuildingID = \"$buildingid\")) AND DeviceTypeID IN (3, 4, 5)) GROUP BY CAST(DateTime AS DATE);");
    if($result->num_rows === 0) return "No data";
    return $result;
}

    public static function light($roomid){
        $dDetails = DbConnection::$connection->query("SELECT * FROM Device WHERE RoomID = '$roomid' AND DeviceTypeID IN (3, 4, 5)");
        if($dDetails->num_rows === 0) return "No data";
        while($d = $dDetails->fetch_object()){
            if($d->State == 1) return "ON";
        }
        return "OFF";
    }
    public static function temperature($roomid){
        $mesurementDetails = DbConnection::$connection->query("SELECT * FROM Mesurement
            WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID = '$roomid' AND SensorTypeID = 1)
            AND DateTime = (
            SELECT MAX(DateTime) 
            FROM Mesurement 
            WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID = '$roomid' AND SensorTypeID = 1));");
        if($mesurementDetails->num_rows === 0) return NULL;
        $mesurement = $mesurementDetails->fetch_object();
        $obj = new Mesurement($mesurement->MesurementID,$mesurement->Value,$mesurement->DateTime,$mesurement->SensorID);
        return $obj;
    }

    public static function humidity($roomid){
        $mesurementDetails = DbConnection::$connection->query("SELECT * FROM Mesurement
            WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID = '$roomid' AND SensorTypeID = 2)
            AND DateTime = (
            SELECT MAX(DateTime) 
            FROM Mesurement 
            WHERE SensorID IN (SELECT SensorID FROM Sensor WHERE RoomID = '$roomid' AND SensorTypeID = 2));");
        if($mesurementDetails->num_rows === 0) return NULL;
        $mesurement = $mesurementDetails->fetch_object();
        $obj = new Mesurement($mesurement->MesurementID,$mesurement->Value,$mesurement->DateTime,$mesurement->SensorID);
        return $obj;
    }

    public static function airCondition($roomid){
        $dDetails = DbConnection::$connection->query("SELECT * FROM Device WHERE RoomID = '$roomid' AND DeviceTypeID = 6");
        if($dDetails->num_rows === 0) return "No data";
        while($d = $dDetails->fetch_object()){
        if($d->State == 1) return "ON";
        }
        return "OFF";
    }

    public static function setPersonInApartment($name, $firstName, $email, $apartmentID){
        return DbConnection::$connection->query("INSERT INTO Person(Name, FirstName, Email, ApartmentID) VALUES (\"$name\", \"$firstName\", \"$email\", \"$apartmentID\")");
    }

    public static function getPeopleInApartment($apartmentID){
        $result = DbConnection::$connection->query("SELECT COUNT(*) as count FROM `person` WHERE ApartmentID='$apartmentID'");
        return 1+(int) $result->fetch_object()->count;
    }

    public static function getPersonDetailsInApartment($apartmentID){
        $result = DbConnection::$connection->query("SELECT * FROM `person` WHERE ApartmentID='$apartmentID'");
        $result1 = DbConnection::$connection->query("SELECT * FROM Account WHERE AccountID = (SELECT AccountID FROM `apartment` WHERE ApartmentID = '$apartmentID')");
        $people = array();
        $result1 = $result1->fetch_object();
        $people[] = [
            "id" => $result1->AccountID,
            "name" => $result1->Name,
            "firstName" => $result1->FirstName,
            "email" => $result1->Mail,
            "username" => $result1->Username,
        ];
        if ($result->num_rows === 0) return $people;
        while ($person = $result->fetch_object()) {
            $people[] = [
                "id" => $person->PersonID,
                "name" => $person->Name,
                "firstName" => $person->FirstName,
                "email" => $person->Email,
            ];
        }
        return $people;
    }

    // MESSAGES
    public static function getMessagesByAdmin()
    {
        $messageDetails= DbConnection::$connection->query("SELECT * FROM Message");
        if ($messageDetails->num_rows === 0) return false;
        $messages = array();
        while ($message = $messageDetails->fetch_object()) {
            $key = new Message($message->MessageID, $message->Text, $message->AccountID, "$message->DateTime");
            $userDets = DbUtils::getUserOnID($message->AccountID);
            $apartment = DbUtils::getApartmentByUser($message->AccountID);
            $key->name = $userDets->name;
            $key->firstname = $userDets->firstName; 
            $key->email = $userDets->email;
            $key->apartmentid = $apartment->apartmentid;
            $key->apartmentname = $apartment->name;
            $messages[] = $key;
        }
        return $messages;
    }

    public static function deleteMessage($messageid){
        return DbConnection::$connection->query("DELETE FROM Message WHERE MessageID = '$messageid'");
    }

    public static function addSensorDescription($sensorid, $desc){
        return DbConnection::$connection->query("INSERT INTO SensorDescp VALUES($sensorid, '$desc')");
    }

    public static function getSensorDescription($sensorid){
        $result = DbConnection::$connection->query("SELECT Description FROM SensorDescp WHERE SensorID = '$sensorid'");
        $result = $result->fetch_object();
        if(!isset($result)) return "";
        return $result->Description;
    }
}
    
?> 
