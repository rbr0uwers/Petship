<?php
class Database{
    private $hostname = "";
    private $dbname = "";
    private $username = "";
    private $password = "";
    private $conn;

    function __destruct(){
        $this->conn->close();
    }
   
    public function getConnection(){
        if (is_null($this->conn)) {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            $this->conn->set_charset("utf8mb4");
            if($this->conn->connect_error) die("Connection failed: " . $this->conn->connect_error);
        } 
        
        return $this->conn;
    }
}
?>