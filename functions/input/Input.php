<?php
abstract class Input {
    public $error;

    public function __construct(){
        $this->error = new InputError(false, "");
    }

    protected function resetError(){
        $this->error->hasError = false;
        $this->error->message = "";
    }

    protected function sanitizeInput($var){
        $result = trim($var);
        $result = strip_tags($result);
        $result = htmlspecialchars($result);

        return $result;
    }

    abstract function getId();
}


class InputError {
    public $hasError;
    public $message;

    public function __construct($hasError, $message){
        $this->hasError = $hasError;
        $this->message = $message;
    }
}
?>