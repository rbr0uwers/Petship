<?php
    require_once 'actions/db_connect.php';

    if(isset($_GET["action"]) && $_GET["action"] == "delete"){
        //do action here
    }  else {
        header("location: error.php");
        exit;   
    }
?>