<?php
include_once('DbConnection.php');
 
class User extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    private function getUser($username, $password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        return $this->connection->query($sql);
    }
 
    public function check_login($username, $password){
        $query = $this->getUser($username, $password);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
 
    public function create_user($username, $password, $name){
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `fname`) VALUES
        (10, '$username', '$password', '$name')";
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