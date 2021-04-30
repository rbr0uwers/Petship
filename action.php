<?php
session_start();
require_once 'functions/Helper.php';
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/MediaDbObject.php';
require_once 'functions/AuthorDbObject.php';
require_once 'functions/MediaAuthorDbObject.php';
require_once 'functions/PublisherDbObject.php';
require_once 'functions/Input.php';
require_once 'functions/MediaInput.php';

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
    $mediaInput = new MediaInput();
    $mediaInput->setId($_POST["mid"]);
    $mediaInput->setOldImage($_POST["image"]);
    $media = new MediaDbObject(new Database());
    $media->deleteItembyId($mediaInput);

    if ($mediaInput->getOldImage() != "generic_book.jpg") unlink("uploads/{$mediaInput->getOldImage()}");

    global $message;
    $message = "Media item (ID: {$mediaInput->getId()}) succesfully deleted.";
}

function updateMedia() {
    $mediaInput = new MediaInput();
    $mediaInput->setImage(file_upload($_FILES['image']));
    $mediaInput->setOldImage($_POST["image"]);
    $updateImage = false;

    if($mediaInput->getImage()->fileName != 'generic_book.jpg') {
        if ($mediaInput->getOldImage() != "generic_book.jpg")  unlink("uploads/{$mediaInput->getOldImage()}");
        $updateImage = true;
    }
    
    $mediaInput->setTitle($_POST["title"]);
    $mediaInput->setIsbn($_POST["isbn"]);
    $mediaInput->setDescription($_POST["description"]);
    $mediaInput->setPubDate($_POST["pub_date"]);
    $mediaInput->setIsAvailable((isset($_POST["isAvailable"]) ? $_POST["isAvailable"] : 0));
    $mediaInput->setType($_POST["type"]);
    $mediaInput->setPid($_POST["pid"]);
    $mediaInput->setId($_POST["mid"]);

    $media = new MediaDbObject(new Database());
    $media->updateMediaById($mediaInput, $updateImage);

    //Delete old media author connections and recreate new ones
    //TODO: Find logic to check real changes upfront
    $media_author = new MediaAuthorDbObject(new Database());
    $media_author->deleteItembyId($mediaInput);

    $aids = $_POST["aid"];
    foreach ($aids as $aid) {
        $media_author->insertNewMediaAuthor($mediaInput, $aid);
    }

    global $message;
    $message = "Media item (ID: {$mediaInput->getId()}) succesfully updated.";
}

function addMedia() {
    $mediaInput = new MediaInput();
    $mediaInput->setTitle($_POST["title"]);
    $mediaInput->setImage(file_upload($_FILES['image']));
    $mediaInput->setIsbn($_POST["isbn"]);
    $mediaInput->setDescription($_POST["description"]);
    $mediaInput->setPubDate($_POST["pub_date"]);
    $mediaInput->setIsAvailable($_POST["isAvailable"]);
    $mediaInput->setType($_POST["type"]);
    $mediaInput->setPid($_POST["pid"]);

    $media = new MediaDbObject(new Database());
    $new_mid = $media->createNewMedia($mediaInput);
    $mediaInput->setId($new_mid);

    $media_author = new MediaAuthorDbObject(new Database());
    $aids = $_POST["aid"];
    foreach ($aids as $aid) {
        $media_author->insertNewMediaAuthor($mediaInput, $aid);
    }

    global $message;
    $message = "Media item succesfully created. New ID: {$mediaInput->getId()}";
} 
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