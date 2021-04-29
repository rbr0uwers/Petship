<?php
class UserDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "user"; 
    }

    public function getUserbyEmail($email){
        $query = "SELECT *
                  FROM user 
                  WHERE email = '{$email}'";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>