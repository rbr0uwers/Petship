<?php
    function exitGracefully() {
        header("location: error.php");
        exit; 
    }

    function sanitizeInput($var){
        $result = trim($var);
        $result = strip_tags($result);
        $result = htmlspecialchars($result);
        return $result;
    }
?>