<?php
include_once('DbConnection.php');
include_once("Person.php");

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
}
?>  