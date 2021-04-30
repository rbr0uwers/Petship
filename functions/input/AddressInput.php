<?php
class AddressInput extends Input {
    private $id;
    private $street;
    private $zip;
    private $city;
  
    public function setId($id) {     
        $this->id = $this->sanitizeInput($id);
    }

    public function getId() {
        return $this->id;
    }

    public function setStreet($street) {     
        $this->street = $this->sanitizeInput($street);
    }

    public function getStreet() {
        return $this->street;
    }

    public function setZip($zip) {     
        $this->zip = $this->sanitizeInput($zip);
    }

    public function getZip() {
        return $this->zip;
    }

    public function setCity($city) {     
        $this->city = $this->sanitizeInput($city);
    }

    public function getCity() {
        return $this->city;
    }
}
?>