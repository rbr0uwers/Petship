<?php
abstract class Input {
    public $error;

    public function __construct(){
        $this->error = new class {
            public $hasError = false;
            public $message = "";
        };
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
}
?>