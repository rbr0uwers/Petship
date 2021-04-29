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

    public function getItemCount(){
        $query = "SELECT count(*) FROM {$this->table_name}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all()[0][0];
    }

    public function getItemsFromRange($limit, $offset){
        $query = "SELECT * FROM {$this->table_name} LIMIT {$limit} OFFSET {$offset}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItems(){
        $query = "SELECT * FROM {$this->table_name}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteItem($id) {
        $query = "DELETE FROM " .$this->table_name. " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $result = $stmt->execute();

        return $result;
    }
}
?>