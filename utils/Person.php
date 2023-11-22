<?php

class Person{
    public int $id;
    public string $username;
    private string $password;
    private int $accessRights;
    public string $email, $firstName, $name;   

    public function __construct($id, $username, $password, $accessRights, $name, $firstName, $email){
        $this->username = $username;
        $this->password = $password;
        $this->accessRights = $accessRights;
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->email = $email;
    }

    private function writeUser($username, $password, $email, $name, $firstName, $accessRights){
        return "INSERT INTO Account (Username, HashPassword, Mail, Name, FirstName, AccessRights) VALUES ('$username', '$password', '$email' , '$name', '$firstName', '$accessRights')";
    }

    public function sendUserToDatabase($connection){
            return $connection->query($this->writeUser($this->username, $this->password, $this->email, $this->name, $this->firstName, $this->accessRights));
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