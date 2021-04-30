<?php
class PetDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "pet"; 
    }

    public function selectPetAddressUserItemsById($pet){
        $query = "SELECT pet.id as pid, address.*, user.*, pet.*
                  FROM {$this->table_name} 
                  INNER JOIN address
                  ON {$this->table_name}.aid = address.id 
                  LEFT JOIN user 
                  ON {$this->table_name}.uid = user.id 
                  WHERE {$this->table_name}.id = {$pet->getId()}";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updatePetById($pet, $updateImage=false) {
        $updateImageStmt = $updateImage ? ", image='{$pet->getImage()->fileName}'" : "";
        $query = "UPDATE {$this->table_name}
                  SET name = '{$pet->getName()}', 
                  breed='{$pet->getBreed()}', 
                  description='{$pet->getDescription()}', 
                  birthdate='{$pet->getBirthdate()}', 
                  size='{$pet->getSize()}', 
                  aid={$pet->getAid()},
                  uid={$pet->getUid()}
                  {$updateImageStmt}
                  WHERE id={$pet->getId()}";
        
        $result = $this->conn->getConnection()->query($query);
    }

    public function adoptPet($pet){
        $query = "UPDATE {$this->table_name}
                  SET uid={$pet->getUid()}
                  WHERE id={$pet->getId()}";
                  
        $result = $this->conn->getConnection()->query($query);
    }

    public function insertNewPet($pet){
        $query = "INSERT INTO {$this->table_name} 
                  (name, image, breed, description, birthdate, size, aid, uid)
                  VALUES ('{$pet->getName()}', 
                  '{$pet->getImage()->fileName}', 
                  '{$pet->getBreed()}', 
                  '{$pet->getDescription()}', 
                  '{$pet->getBirthdate()}', 
                  '{$pet->getSize()}', 
                  {$pet->getAid()},
                  {$pet->getUid()})";

        $result = $this->conn->getConnection()->query($query);

        return $this->conn->getConnection()->insert_id;
    }
}
?>