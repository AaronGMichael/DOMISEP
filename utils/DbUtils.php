<?php
include_once('DbConnection.php');
include_once("Person.php");

class DbUtils extends DbConnection{

    private function getUsersWhereUserame($username){
       return "SELECT * FROM Account WHERE username = '$username'";
    }

    private function writeUser($username, $password, $email, $name, $firstName, $accessRights){
        return `INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights) VALUES ("$username", "$password", "$email" , "$name", "$firstName", $accessRights)`;
    }

    public function setUser($P){
        if($this->connection->query($this->getUsersWhereUserame($P->Username))->num_rows > 0){
            return 300;
        }
        else{
            return $P->sendUserToDatabase();
        }
    }

    public function getUser($username){
        $userDetails = $this->connection->query($this->getUsersWhereUserame($username));
        $userDetails = $userDetails->fetch_object();
        $P = new Person($userDetails->AccountID, $userDetails->Username,$userDetails->HashPassword,$userDetails->accessRights);
        return $P;
    }
}
?>  