<?php
class MediaDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "media"; 
    }

    public function getMediaAndPublisherItems($id){
        $query = "SELECT * 
                  FROM media 
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
}
?>