<?php
class UserInput extends Input {
    private $id;
    private $fName;
    private $lName;
    private $email;
    private $password;

    private function validateName($name){
        $this->resetError();
        
        if (strlen($name) < 3) {
            $this->error->hasError = true;
            $this->error->message = "Minimum character 3 characters are required.";
        } 
    }

    private function validateEmail($email){
        $this->resetError();
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error->hasError = true;
            $this->error->message = "Please provide a valid email address.";
        }
    }

    private function validatePasswords($password, $passwordRepeat){
        $this->resetError();

        if ($password != $passwordRepeat) {
            $this->error->hasError = true;
            $this->error->message = "Passwords are not the same.";
        }

        $this->validatePassword($password);        
    }

    private function validatePassword($password){
        $this->resetError();

        if (strlen($password) < 8) {
            $this->error->hasError = true;
            $this->error->message = "Minimum character 8 characters are required.";
            return;
        }
    }
    
    public function setfName($fName){
        $fName = $this->sanitizeInput($fName);
        $this->validateName($fName);

        $this->fName = $this->error->hasError ? null : $fName;
    }

    public function getfName () {
        return $this->fName;
    }

    public function setlName($lName){
        $lName = $this->sanitizeInput($lName);
        $this->validateName($lName);

        $this->lName = $this->error->hasError ? null : $lName;
    }

    public function getlName () {
        return $this->lName;
    }

    public function setEmail($email){
        $email = $this->sanitizeInput($email);
        $this->validateEmail($email);

        $this->email = $this->error->hasError ? null : $email;
    }

    public function getEmail () {
        return $this->email;
    }

    public function setPassword($password){
        $password = $this->sanitizeInput($password);
        $this->validatePassword($password);

        //password not hashed for login comparison TODO: make better 
        $this->password = $this->error->hasError ? null : $password;
    }

    public function setPasswords($password, $passwordRepeat){
        $password = $this->sanitizeInput($password);
        $passwordRepeat = $this->sanitizeInput($passwordRepeat);
        $this->validatePasswords($password, $passwordRepeat);

        $this->password = $this->error->hasError ? null : password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword () {
        return $this->password;
    }

    public function getId() {
        return $this->id;
    }

}
?>