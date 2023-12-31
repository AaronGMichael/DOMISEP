<?php
include_once('DbConnection.php');
 
class User extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    private function getUser($username){
        $sql = "SELECT * FROM users WHERE username = '$username'";
        return $this->connection->query($sql);
    }
 
    public function check_login($username, $password){
        $query = $this->getUser($username);
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            if(password_verify($password, $row['password'])){
                return $row['id'];
            }
            else return false;
        }
        else{
            return false;
        }
    }
 
    public function create_user($username, $password, $name){
        $date = new DateTimeImmutable();
        $id = $date->getTimestamp();
        if(($this->getUser($username)->num_rows) > 0){
            return false;
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `fname`) VALUES
        ('$id', '$username', '$hash', '$name')";
        return $this->connection->query($sql);
    }

    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }

}