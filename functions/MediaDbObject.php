<?php
class MediaDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "media"; 
    }

    public function getMediaAndPublisherItems($id){
        $query = "SELECT * 
                  FROM {$this->table_name} 
                  INNER JOIN media_author 
                  ON media.mid = media_author.mid 
                  INNER JOIN author 
                  ON media_author.aid = author.aid 
                  INNER JOIN publisher 
                  ON media.pid = publisher.pid 
                  WHERE media.mid = {$id}";
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

    public function getAuthorsByMediaId($medium){
        $query = "SELECT *
                  FROM {$this->table_name} 
                  INNER JOIN media_author
                  ON media.mid = media_author.mid
                  WHERE {$medium->getId()} = media_author.mid";

        $result = $this->conn->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>