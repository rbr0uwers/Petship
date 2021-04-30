<?php
class PetInput extends Input {
    private $id;
    private $old_image;
    private $image;
    private $name;
    private $breed;
    private $description;
    private $birthdate;
    private $size;
    private $aid;
    private $uid;
    
    public function setId($id) {     
        $this->id = $this->sanitizeInput($id);
    }

    public function getId() {
        return $this->id;
    }

    public function setOldImage($old_image) {     
        $this->old_image = $this->sanitizeInput($old_image);
    }

    public function getOldImage() {
        return $this->old_image;
    }

    public function setImage($image) {     
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function setName($name) {     
        $this->name = $this->sanitizeInput($name);
    }

    public function getName() {
        return $this->name;
    }

    public function setBreed($breed) {     
        $this->breed = $this->sanitizeInput($breed);
    }

    public function getBreed() {
        return $this->breed;
    }

    public function setDescription($description) {     
        $this->description = $this->sanitizeInput($description);
    }

    public function getDescription() {
        return $this->description;
    }

    public function setBirthdate($birthdate) {     
        $this->birthdate = $this->sanitizeInput($birthdate);
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setSize($size) {     
        $this->size = $this->sanitizeInput($size);
    }

    public function getSize() {
        return $this->size;
    }

    public function setAid($aid) {     
        $this->aid = $this->sanitizeInput($aid);
    }

    public function getAid() {
        return $this->aid;
    }

    public function setUid($uid) {
        $this->uid = $this->sanitizeInput($uid);
    }

    public function getUid() {
        return $this->uid;
    }

}
?>