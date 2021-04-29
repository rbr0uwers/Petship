<?php
class UserInput extends Input {
    private $fName;
    private $lName;
    private $email;
    private $password;

    public function setfName($fName){
        $this->fName = sanitizeInput($fName);
    }

    public function getfName () {
        return $this->fName;
    }

    public function setlName($lName){
        $this->lName = sanitizeInput($lName);
    }

    public function getlName () {
        return $this->lName;
    }

    public function setEmail($email){
        $this->email = sanitizeInput($email);
    }

    public function getEmail () {
        return $this->email;
    }

    public function setPassword($password){
        $this->password = sanitizeInput($password);
    }

    public function getPassword () {
        return $this->password;
    }

}
?>