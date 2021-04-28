<?php
class Database{
    private $hostname = "localhost";
    private $dbname = "crud_library";
    private $username = "root";
    private $password = "";
    private $conn;

    function __destruct(){
        $this->conn->close();
    }
   
    public function getConnection(){
        if (is_null($this->conn)) {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            if($this->conn->connect_error) die("Connection failed: " . $this->conn->connect_error);
        } 
        
        return $this->conn;
    }
}
?>