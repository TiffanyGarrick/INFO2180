<?php
//used to get mysql database connection

class Database{
    private $host = "localhost";
    private $db_name = "bugme";
    private $username = "root";
    private $password = "";
    public $conn;
    
    public function getConnection(){
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
    
}