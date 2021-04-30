<?php
class MediaAuthorDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "media_author"; 
    }

    public function insertNewMediaAuthor($media, $aid) {
        $query = "INSERT INTO media_author (mid, aid)
                  VALUES ({$media->getId()}, {$aid})";

        $result = $this->conn->getConnection()->query($query);
    }
}
?>