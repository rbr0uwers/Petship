<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_library";

    $mysqli = new mysqli($hostname, $username, $password, $dbname);

    if($mysqli->connect_error) die("Connection failed: " . $mysqli->connect_error);
?>