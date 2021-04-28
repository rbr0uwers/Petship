<?php
session_start();
require_once 'actions/db_connect.php';
require_once 'actions/functions.php';
require_once 'actions/file_upload.php';

if(!isset($_POST["action"])) exitGracefully();

$message = "";

switch($_POST["action"]) {
    case "delete":
        deleteMedia();
        break;
    case "modify":
        updateMedia();
        break;
    case "add":
        addMedia();
        break;
    default:
        exitGracefully();
}

function deleteMedia() { 
    $mid = sanitizeInput($_POST["mid"]);
    $old_image = sanitizeInput($_POST["image"]);

    $sql = "DELETE FROM media
            WHERE mid = $mid";
    
    global $mysqli;
    $mysqli->query($sql) ?: exitGracefully();

    if ($old_image != "generic_book.jpg") unlink("uploads/{$old_image}");

    global $message;
    $message = "Media item (ID: {$mid}) succesfully deleted.";
}

function updateMedia() {
    $image = file_upload($_FILES['image']); 
    $old_image = $_POST["image"];
    $updateImageStmt = "";

    if($image->fileName != 'generic_book.jpg') {
        if ($old_image != "generic_book.jpg")  unlink("uploads/{$old_image}");
        $updateImageStmt = ", image='{$image->fileName}'";
    }
    
    $title = sanitizeInput($_POST["title"]);
    $isbn = sanitizeInput($_POST["isbn"]);
    $description = sanitizeInput($_POST["description"]);
    $pub_date = sanitizeInput($_POST["pub_date"]);
    $isAvailable = isset($_POST["isAvailable"]) && $_POST["isAvailable"] == "true" ? 1 : 0;
    $type = sanitizeInput($_POST["type"]);
    $pid = sanitizeInput($_POST["pid"]);
    $mid = sanitizeInput($_POST["mid"]);

    $sql = "UPDATE media
            SET title = '$title'{$updateImageStmt}, isbn='$isbn', description='$description', pub_date='$pub_date', isAvailable=$isAvailable, type='$type', pid=$pid
            WHERE mid=$mid";

    global $mysqli;
    $mysqli->query($sql) ?: exitGracefully($mysqli->error);

    //Delete old media author connections and recreate new ones
    //TODO: Find logic to check real changes upfront
    $sql = "DELETE FROM media_author
            WHERE mid = $mid";
    $mysqli->query($sql);

    $aids = $_POST["aid"];
    foreach ($aids as $aid) {
        $sql = "INSERT INTO media_author (mid, aid)
                VALUES ($mid, $aid)";
        $mysqli->query($sql);
    }

    global $message;
    $message = "Media item (ID: $mid) succesfully updated.";
}

function addMedia() {
    $title = sanitizeInput($_POST["title"]);
    $image = file_upload($_FILES['image']);
    $isbn = sanitizeInput($_POST["isbn"]);
    $description = sanitizeInput($_POST["description"]);
    $pub_date = sanitizeInput($_POST["pub_date"]);
    $isAvailable = isset($_POST["isAvailable"]) && $_POST["isAvailable"] == "true" ? 1 : 0;
    $type = sanitizeInput($_POST["type"]);
    $pid = sanitizeInput($_POST["pid"]);

    $sql = "INSERT INTO media (title, image, isbn, description, pub_date, isAvailable, type, pid)
            VALUES ('$title', '$image->fileName', '$isbn', '$description', '$pub_date', $isAvailable, '$type', $pid)";
    
    global $mysqli;
    $mysqli->query($sql) ?: exitGracefully();
    
    $new_mid = $mysqli->insert_id;
    $aids = $_POST["aid"];
    foreach ($aids as $aid) {
        $sql = "INSERT INTO media_author (mid, aid)
                VALUES ($new_mid, $aid)";
        $mysqli->query($sql);
    }

    global $message;
    $message = "Media item succesfully created. New ID: $new_mid";
} 

$mysqli->close();
?>

<?php
$page_title = "National Libray of CRUD";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
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
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>