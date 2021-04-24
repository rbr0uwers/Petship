<?php
    require_once 'actions/db_connect.php';
    require_once 'actions/functions.php';
    
    if(isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        exitGracefully();
    }

    if($action != "modify" && $action!= "add" && $action!= "delete") exitGracefully();

    $title = $_POST["title"];
    $image = $_POST["image"];
    $isbn = $_POST["isbn"];
    $description = $_POST["description"];
    $pub_date = $_POST["pub_date"];
    $isAvailable = isset($_POST["isAvailable"]) && $_POST["isAvailable"] == "true" ? 1 : 0;
    $type = $_POST["type"];
    $pid = $_POST["pid"];

    if ($action == "modify") {
        $mid = $_POST["mid"];
        $sql = "UPDATE media
                SET title = '$title', image='$image', isbn='$isbn', description='$description', pub_date='$pub_date', isAvailable=$isAvailable, type='$type', pid=$pid
                WHERE mid=$mid";

        $result = $mysqli->query($sql); 
        if (!$result) exitGracefully();

        $aids = $pid = $_POST["aid"];

        //delete old media author conenctions and recreate new ones
        //TODO: Find logic to check real changes upfront
        $sql = "DELETE FROM media_author
                WHERE mid = $mid";
        $mysqli->query($sql);

        foreach ($aids as $aid) {
            $sql = "INSERT INTO media_author (mid, aid)
                    VALUES ($mid, $aid)";
            $mysqli->query($sql);

            $message = "Media item (ID: $mid) succesfully created.";
        }
    
    } elseif ($action == "add") {
        $sql = "INSERT INTO media (title, image, isbn, description, pub_date, isAvailable, type, pid)
                VALUES ('$title', '$image', '$isbn', '$description', '$pub_date', $isAvailable, '$type', $pid)";
        
        $result = $mysqli->query($sql);
        if (!$result) exitGracefully();
        
        $new_mid = $mysqli->insert_id;
        $aids = $pid = $_POST["aid"];

        foreach ($aids as $aid) {
            $sql = "INSERT INTO media_author (mid, aid)
                    VALUES ($new_mid, $aid)";
            $mysqli->query($sql);
        }

        $message = "Media item succesfully created. New ID: $new_mid";

    } elseif ($action == "delete") {
        $mid = $_POST["mid"];
        $sql = "DELETE FROM media
                WHERE mid = $mid";
        
        $result = $mysqli->query($sql);
        
        if (!$result) exitGracefully();
        $message = "Media item (ID: $mid) succesfully deleted.";
    }

    $mysqli->close();
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
        <li class="breadcrumb-item" aria-current="page">Message</li>
    </ol>
</nav>
<div class="mt-3 mb-3">
    <h1>Success</h1>
</div>
 <div class="alert alert-success" role="alert">
    <p><?php echo $message ?></p>
</div>