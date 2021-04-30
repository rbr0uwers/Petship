<?php
session_start();
require_once 'functions/Helper.php';
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/MediaDbObject.php';
require_once 'functions/Input.php';
require_once 'functions/MediaInput.php';

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET["mid"])) exitGracefully();

$mediaInput = new MediaInput();
$mediaInput->setId($_GET["mid"]);
$media = new MediaDbObject(new Database());
$result = $media->getMediaAndPublisherItems($mediaInput);

if (count($result) == 0) exitGracefully();
?>

<?php
$page_title = "National Libray of CRUD | Details";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $result[0]["title"] ?></li>
        </ol>
    </nav>
    <div class="row g-4">
        <div class="col-sm-4">
            <img class="img-responsive-big" src=<?php echo '"uploads/'.$result[0]["image"].'"' ?> alt="">
        </div>
        <div class="col-sm-6">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">Book Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-author-tab" data-bs-toggle="pill" data-bs-target="#pills-author" type="button" role="tab" aria-controls="pills-author" aria-selected="false">Author</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-publisher-tab" data-bs-toggle="pill" data-bs-target="#pills-publisher" type="button" role="tab" aria-controls="pills-publisher" aria-selected="false">Publisher</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                <p class="h2"><?php echo $result[0]["title"] ?></p>
                <p class=""><?php echo $result[0]["description"] ?></p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ISBN: <?php echo $result[0]["isbn"] ?></li>
                <li class="list-group-item">Published: <?php echo $result[0]["pub_date"] ?></li>
                <li class="list-group-item">Media-Type: </i><?php echo strtoupper($result[0]["type"]) ?></li>
                <li class="list-group-item">Availability: <?php echo $result[0]["isAvailable"]? '<i class="bi bi-emoji-smile text-success"></i>' : '<i class="bi bi-emoji-frown text-danger"></i>' ?></li>
            </ul>
            </div>
            <div class="tab-pane fade" id="pills-author" role="tabpanel" aria-labelledby="pills-author-tab">
                <ul class="list-group list-group-flush">
                    <?php foreach($result as $item) { echo '<li class="list-group-item">'.$item["fname"].' '.$item["lname"].'</li>';} ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-publisher" role="tabpanel" aria-labelledby="pills-publisher-tab">
                <p class="h3"><?php echo $result[0]["name"] ?></p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Company size: 
                        <?php 
                            switch($result[0]["size"]) {
                                case "small": 
                                    echo '<i class="bi bi-house"></i>';
                                    break;
                                case "medium":
                                    echo '<i class="bi bi-shop"></i>';
                                    break;
                                case "big":
                                    echo '<i class="bi bi-building"></i>';
                            }
                        ?>
                    </li>
                    <li class="list-group-item"><?php echo $result[0]["street"] ?> <br> <?php echo $result[0]["zip"] ?> <?php echo $result[0]["city"] ?> <br> <?php echo $result[0]["country"] ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>