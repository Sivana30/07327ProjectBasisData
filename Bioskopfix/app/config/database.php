<?php
class database{
    private $servername = DB_SERVER;
    private $username = DB_USER;
    private $pass = DB_PASS;
    private $database = DB_NAME;
    private $conn;
    private $stmt;
    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, 
            $this->pass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    public function getAll($sql){
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get($sql){
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function query($sql){
        $this->conn->exec($sql);
    }
    
}