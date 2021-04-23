<?php
    require_once 'actions/db_connect.php';

    if(isset($_GET["mid"])) {
        $mid = $_GET["mid"];
    } else {
        header("location: error.php");
        exit;   
    }

    $sql = "SELECT * 
            FROM media 
            INNER JOIN media_author 
            ON media.mid = media_author.mid 
            INNER JOIN author 
            ON media_author.aid = author.aid 
            INNER JOIN publisher 
            ON media.pid = publisher.pid 
            WHERE media.mid=$mid";

    $result = $mysqli->query($sql);
    $media = $result->fetch_all(MYSQLI_ASSOC);

    $mysqli->close();
?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $media[0]["title"] ?></li>
    </ol>
    </nav>
<div class="row g-4">
    <div class="col-sm-4">
        <img class="img-responsive-big" src="<?php echo $media[0]["image"] ?>" alt="">
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
            <p class="h2"><?php echo $media[0]["title"] ?></p>
            <p class=""><?php echo $media[0]["description"] ?></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ISBN: <?php echo $media[0]["isbn"] ?></li>
            <li class="list-group-item">Published: <?php echo $media[0]["pub_date"] ?></li>
            <li class="list-group-item">Media-Type: </i><?php echo strtoupper($media[0]["type"]) ?></li>
            <li class="list-group-item">Availability: <?php echo $media[0]["isAvailable"]? '<i class="bi bi-emoji-smile text-success"></i>' : '<i class="bi bi-emoji-frown text-danger"></i>' ?></li>
        </ul>
        </div>
        <div class="tab-pane fade" id="pills-author" role="tabpanel" aria-labelledby="pills-author-tab">
            <ul class="list-group list-group-flush">
                <?php foreach($media as $item) { echo '<li class="list-group-item">'.$item["fname"].' '.$item["lname"].'</li>';} ?>
            </ul>
        </div>
        <div class="tab-pane fade" id="pills-publisher" role="tabpanel" aria-labelledby="pills-publisher-tab">
            <p class="h3"><?php echo $media[0]["name"] ?></p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Company size: 
                    <?php 
                        switch($media[0]["size"]) {
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
                <li class="list-group-item"><?php echo $media[0]["street"] ?> <br> <?php echo $media[0]["zip"] ?> <?php echo $media[0]["city"] ?> <br> <?php echo $media[0]["country"] ?></li>
            </ul>
        </div>
    </div>
</div>