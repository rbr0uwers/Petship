<?php
abstract class DbObject {
    protected $table_name;
    protected $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    protected function sanitizeInput($var){
        $result = trim($var);
        $result = strip_tags($result);
        $result = htmlspecialchars($result);

        return $result;
    }

    public function selectItemCount($showSeniorsOnly){
        // temp solution, can be made prettier in future...
        $queryAddition = $showSeniorsOnly ? "WHERE timestampdiff(YEAR,birthdate,now()) > 8" : "";
        $query = "SELECT count(*) 
                  FROM {$this->table_name}
                  {$queryAddition}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all()[0][0];
    }

    public function selectItemsFromRange($limit, $offset, $showSeniorsOnly){
        // temp solution, can be made prettier in future...
        $queryAddition = $showSeniorsOnly ? "WHERE timestampdiff(YEAR,birthdate,now()) > 8" : "";
        $query = "SELECT * 
                  FROM {$this->table_name}
                  {$queryAddition} 
                  LIMIT {$limit} OFFSET {$offset}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function selectAllItems(){
        $query = "SELECT * 
                  FROM {$this->table_name}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function selectItemById($Input){
        $query = "SELECT * 
                  FROM {$this->table_name}
                  WHERE id={$input->getId()}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteItembyId($input) {
        $query = "DELETE FROM {$this->table_name} 
                  WHERE id = {$input->getId()}";

        $result = $this->conn->getConnection()->query($query);
    }
}
?>