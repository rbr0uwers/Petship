<?php
abstract class Input {
    protected function sanitizeInput($var){
        $result = trim($var);
        $result = strip_tags($result);
        $result = htmlspecialchars($result);

        return $result;
    }
}
?>