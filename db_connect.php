<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dannys";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);

    // if($mysqli->connect_error) {
    //     die("Connection failed: " . $mysqli->connect_error);
    // }else {
    //     echo "Successfully Connected";
    // }
?>