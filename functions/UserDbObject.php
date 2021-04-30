<?php
class UserDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "user"; 
    }

    public function getUserbyEmail($user){
        $query = "SELECT *
                  FROM {$this->table_name}
                  WHERE email = '{$user->getEmail()}'";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNewUser($user){
        $query = "INSERT INTO {$this->table_name} (fName, lName, email, password, status)
        VALUES ('{$user->getfName()}', '{$user->getlName()}', '{$user->getEmail()}', '{$user->getPassword()}', 'user')";

        $result = $this->conn->getConnection()->query($query);

        return $this->conn->getConnection()->insert_id;
    }
    
}
?>