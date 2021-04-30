<?php
class MediaDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "media"; 
    }

    public function getMediaAndPublisherItems($media){
        $query = "SELECT * 
                  FROM {$this->table_name} 
                  INNER JOIN media_author 
                  ON media.mid = media_author.mid 
                  INNER JOIN author 
                  ON media_author.aid = author.aid 
                  INNER JOIN publisher 
                  ON media.pid = publisher.pid 
                  WHERE media.mid = {$media->getId()}";
        $result = $this->conn->getConnection()->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMediabyId($media){
        $query = "SELECT *
                  FROM {$this->table_name}
                  WHERE mid = '{$media->getId()}'";
        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuthorsByMediaId($media){
        $query = "SELECT *
                  FROM {$this->table_name} 
                  INNER JOIN media_author
                  ON media.mid = media_author.mid
                  WHERE {$media->getId()} = media_author.mid";

        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateMediaById($media, $updateImage=false) {
        $updateImageStmt = $updateImage ? ", image='{$media->getImage()->fileName}'" : "";
        $query = "UPDATE {$this->table_name}
                  SET title = '{$media->getTitle()}', isbn='{$media->getIsbn()}', description='{$media->getDescription()}', pub_date='{$media->getPubDate()}', isAvailable={$media->getIsAvailable()}, type='{$media->getType()}', pid={$media->getPid()}{$updateImageStmt}
                  WHERE mid={$media->getId()}";

        $result = $this->conn->getConnection()->query($query);
    }

    public function createNewMedia($media){
        $query = "INSERT INTO {$this->table_name} (title, image, isbn, description, pub_date, isAvailable, type, pid)
        VALUES ('{$media->getTitle()}', '{$media->getImage()->fileName}', '{$media->getIsbn()}', '{$media->getDescription()}', '{$media->getPubDate()}', {$media->getIsAvailable()}, '{$media->getType()}', {$media->getPid()})";

        $result = $this->conn->getConnection()->query($query);

        return $this->conn->getConnection()->insert_id;
    }
}
?>