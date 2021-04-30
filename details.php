<?php
session_start();
require_once 'functions/Globals.php';
require_once 'functions/Database.php';
require_once 'functions/dbobject/DbObject.php';
require_once 'functions/dbobject/PetDbObject.php';
require_once 'functions/input/Input.php';
require_once 'functions/input/PetInput.php';

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["id"])) exitGracefully();

$pet = new PetInput();
$pet->setId($_GET["id"]);
$petDbObject = new PetDbObject(new Database());
$result = $petDbObject->selectPetAddressUserItemsById($pet);

if (count($result) == 0) exitGracefully();
if (isset($_GET["action"]) && ($_GET["action"] == "adopt")) adoptPet();

function adoptPet() {
    global $pet;
    $pet->setUid(isset($_SESSION['user']) ? $_SESSION['user'] : $_SESSION['admin']);
    global $petDbObject;
    $petDbObject->adoptPet($pet);
    header("Location: details.php?id={$pet->getId()}");
}
?>

<?php
$page_title = "Petship | Details";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $result[0]["name"] ?></li>
        </ol>
    </nav>
    <div class="row g-4">
        <div class="col-sm-4">
            <img class="img-responsive-big" src=<?php echo '"uploads/'.$result[0]["image"].'"' ?> alt="">
        </div>
        <div class="col-sm-6">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Details of <?php echo $result[0]["name"] ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address" type="button" role="tab" aria-controls="pills-address" aria-selected="false">Address</button>
                </li>
                <?php echo is_null($result[0]["uid"]) ? '' :
                '<li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-owner-tab" data-bs-toggle="pill" data-bs-target="#pills-owner" type="button" role="tab" aria-controls="pills-owner" aria-selected="false">Current Owner</button>
                </li>' ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                <p class="h2"><?php echo $result[0]["name"] ?></p>
                <p class=""><?php echo $result[0]["description"] ?></p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Breed: <?php echo $result[0]["breed"] ?></li>
                    <li class="list-group-item">Birthday: <?php echo $result[0]["birthdate"] ?></li>
                    <li class="list-group-item">Size: </i><?php echo $result[0]["size"] ?></li>
                    <li class="list-group-item">Availability: <?php echo is_null($result[0]["uid"]) ? '<i class="bi bi-emoji-smile text-success"></i>' : '<i class="bi bi-emoji-frown text-danger"></i>' ?></li>
                </ul>
                <?php echo is_null($result[0]["uid"]) ? '<a href="details.php?action=adopt&id='.$result[0]["id"].'" class="btn btn-success mt-5"><i class="bi bi-heart"></i> Adopt '.$result[0]["name"].'</a>'  : '' ?>
            </div>
            <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $result[0]["street"] ?> <br> <?php echo $result[0]["zip"] ?> <?php echo $result[0]["city"] ?></li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-owner" role="tabpanel" aria-labelledby="pills-owner-tab">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $result[0]["fName"].' '?><?php echo $result[0]["lName"] ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>