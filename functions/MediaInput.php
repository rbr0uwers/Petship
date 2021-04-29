<?php
class MediaInput extends Input {
    private $id;
    private $lName;
    private $email;
    private $password;

    public function setId ($mid) {
        $this->id = $mid;
    }

    public function getId () {
        return $this->id;
    }

}
?>