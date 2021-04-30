<?php
class AddressDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "address"; 
    }

    public function updateAddressById($address){
        $query = "UPDATE {$this->table_name}
                  SET street = '{$address->getStreet()}', 
                  zip='{$address->getZip()}', 
                  city='{$address->getCity()}'
                  WHERE id='{$address->getId()}'";
        console_log($query);
        $result = $this->conn->getConnection()->query($query);
    }

    public function insertNewAddress($address){
        $query = "INSERT INTO {$this->table_name} 
                  (street, zip, city)
                  VALUES ('{$address->getStreet()}', 
                  '{$address->getZip()}', 
                  '{$address->getCity()}')";

        $result = $this->conn->getConnection()->query($query);

        return $this->conn->getConnection()->insert_id;
    }
}
?>