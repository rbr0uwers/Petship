<?php
class PublisherDbObject extends DbObject {
    public function __construct($db){
        parent::__construct($db);
        $this->table_name = "publisher"; 
    }
}
?>