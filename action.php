<?php
session_start();
require_once 'functions/Globals.php';
require_once 'functions/Database.php';
require_once 'functions/dbobject/DbObject.php';
require_once 'functions/dbobject/PetDbObject.php';
require_once 'functions/dbobject/AddressDbObject.php';
require_once 'functions/input/Input.php';
require_once 'functions/input/PetInput.php';
require_once 'functions/input/AddressInput.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} 
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if(!isset($_POST["action"])) exitGracefully();

$message = "";

switch($_POST["action"]) {
    case "delete":
        deletePet();
        break;
    case "modify":
        updatePet();
        break;
    case "add":
        addPet();
        break;
    default:
        exitGracefully();
}

function deletePet() { 
    $petInput = new PetInput();
    $petInput->setId($_POST["id"]);
    $petInput->setOldImage($_POST["image"]);
    $petDbObject = new PetDbObject(new Database());
    $petDbObject->deleteItembyId($petInput);

    if ($petInput->getOldImage() != DEFAULT_IMAGE) unlink("uploads/{$petInput->getOldImage()}");

    global $message;
    $message = "Pet (ID: {$petInput->getId()}) succesfully deleted.";
}

function updatePet() {
    $petInput = new PetInput();
    $petInput->setImage(file_upload($_FILES['image']));
    $petInput->setOldImage($_POST["image"]);

    $updateImage = false;
    if($petInput->getImage()->fileName != DEFAULT_IMAGE) {
        if ($petInput->getOldImage() != DEFAULT_IMAGE)  unlink("uploads/{$petInput->getOldImage()}");
        $updateImage = true;
    }
    
    $petInput->setName($_POST["name"]);
    $petInput->setBreed($_POST["breed"]);
    $petInput->setDescription($_POST["description"]);
    $petInput->setBirthdate($_POST["birthdate"]);
    $petInput->setSize($_POST["size"]);
    $petInput->setAid($_POST["aid"]);
    $petInput->setUid($_POST["uid"]);
    $petInput->setId($_POST["id"]);

    $petDbObject = new PetDbObject(new Database());
    $petDbObject->updatePetById($petInput, $updateImage);

    $addressInput = new AddressInput();
    $addressInput->setId($_POST["aid"]);
    $addressInput->setZip($_POST["zip"]);
    $addressInput->setStreet($_POST["street"]);
    $addressInput->setCity($_POST["city"]);

    $addressDbObject = new AddressDbObject(new Database());
    $addressDbObject->updateAddressById($addressInput);

    global $message;
    $message = "Pet (ID: {$petInput->getId()}) and Address (ID: {$addressInput->getId()}) succesfully updated.";
}

function addPet() {
    $addressInput = new AddressInput();
    $addressInput->setZip($_POST["zip"]);
    $addressInput->setStreet($_POST["street"]);
    $addressInput->setCity($_POST["city"]);

    $addressDbObject = new AddressDbObject(new Database());
    $address_id = $addressDbObject->insertNewAddress($addressInput);
    $addressInput->setId($address_id);

    $petInput = new PetInput();;
    $petInput->setName($_POST["name"]);
    $petInput->setBreed($_POST["breed"]);
    $petInput->setImage(file_upload($_FILES['image']));
    $petInput->setDescription($_POST["description"]);
    $petInput->setBirthdate($_POST["birthdate"]);
    $petInput->setSize($_POST["size"]);
    $petInput->setAid($addressInput->getId());
    $petInput->setUid($_POST["uid"]);

    $petDbObject = new PetDbObject(new Database());
    $pet_id = $petDbObject->insertNewPet($petInput);
    $petInput->setId($pet_id);

    global $message;
    $message = "Pet and Address successfully created. New Pet ID: {$petInput->getId()}, new Address ID: {$addressInput->getId()}";
} 
?>

<?php
$page_title = "Petship";
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