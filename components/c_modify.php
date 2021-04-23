<?php
    if(!isset($_GET["action"])){
        header("location: error.php");
        exit; 
    }  

    if ($_GET["action"] == "add") {
        if ($_GET["name"] && $_GET["price"] && $_GET["description"] && $_GET["img_url"]) {
            $name = $_GET["name"];
            $price = $_GET["price"];
            $description = $_GET["description"];
            $img_url = $_GET["img_url"];

            $sql = "INSERT INTO dishes(name, price, description, img_url) VALUES ('$name', '$price', '$description', '$img_url')";
            $del_result = $mysqli->query($sql);
        }
    } elseif ($_GET["action"] == "modify") {
        //load sql with id
    } else {
        header("location: error.php");
        exit;   
    }
    
?>