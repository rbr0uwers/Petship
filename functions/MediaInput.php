<?php
class MediaInput extends Input {
    private $id;
    private $old_image;
    private $image;
    private $title;
    private $isbn;
    private $description;
    private $pub_date;
    private $isAvailable;
    private $type;
    private $pid;
    
    public function setId ($mid) {     
        $this->id = $this->sanitizeInput($mid);
    }

    public function getId () {
        return $this->id;
    }

    public function setOldImage ($old_image) {     
        $this->old_image = $this->sanitizeInput($old_image);
    }

    public function getOldImage () {
        return $this->old_image;
    }

    public function setImage ($image) {     
        $this->image = $image;
    }

    public function getImage () {
        return $this->image;
    }

    public function setTitle ($title) {     
        $this->title = $this->sanitizeInput($title);
    }

    public function getTitle () {
        return $this->title;
    }

    public function setIsbn ($isbn) {     
        $this->isbn = $this->sanitizeInput($isbn);
    }

    public function getIsbn () {
        return $this->isbn;
    }

    public function setDescription ($description) {     
        $this->description = $this->sanitizeInput($description);
    }

    public function getDescription () {
        return $this->description;
    }
    public function setPubDate ($pub_date) {     
        $this->pub_date = $this->sanitizeInput($pub_date);
    }

    public function getPubDate () {
        return $this->pub_date;
    }
    public function setIsAvailable ($isAvailable) {
        $this->isAvailable = $isAvailable == "true" ? 1 : 0;
    }

    public function getIsAvailable () {
        return $this->isAvailable;
    }

    public function setType ($type) {     
        $this->type = $this->sanitizeInput($type);
    }

    public function getType () {
        return $this->type;
    }

    public function setPid ($pid) {     
        $this->pid = $this->sanitizeInput($pid);
    }

    public function getPid () {
        return $this->pid;
    }

}
?>