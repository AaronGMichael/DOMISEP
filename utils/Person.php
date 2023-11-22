<?php

class Person{
    private int $id;
    public string $username;
    private string $password;
    private int $accessRights;
    public string $email, $firstName, $name;   

    public function __construct($id, $username, $password, $accessRights, $name, $firstName){
        $this->username = $username;
        $this->password = $password;
        $this->accessRights = $accessRights;
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
    }

    private function writeUser($username, $password, $email, $name, $firstName, $accessRights){
        return `INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights) VALUES ("$username", "$password", "$email" , "$name", "$firstName", $accessRights)`;
    }

    public function sendUserToDatabase(){
            return $this->connection->query($this->writeUser($P->username, $P->password, $P->email, $P->name));
    }

    public function isAdmin(){
        if($this->accessRights == 100){
            return true;
        }
        return false;
    }

    public function isUser(){
        if($this->accessRights == 101){
            return true;
        }
        return false;
    }

    public function isOwner(){
        if($this->accessRights == 99){
            return true;
        }
        return false;
    }

    public function verify($password){
        return password_verify($password, $this->password);
    }
}

?>