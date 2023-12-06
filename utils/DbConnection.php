<?php

require("devOptions.php");

class DbConnection{
 
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'loginpage2';
 
    protected static $connection;
 
    public function __construct(){
 
        if (!isset(DbConnection::$connection)) {
 
            DbConnection::$connection = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!DbConnection::$connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return DbConnection::$connection;
    }
}
?>