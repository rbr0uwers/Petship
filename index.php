<?php
session_start();
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/MediaDbObject.php';

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
} 

$item_size = 12;
$offset = isset($_GET["show"]) ? $_GET["show"] : 0;

$media = new MediaDbObject(new Database());
$row_count = $media->getItemCount();
$result = $media->getItemsFromRange($item_size, $offset);
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
        </ol>
    </nav>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">   
        <?php
            foreach ($result as $media) {  
                echo '
                <div class="col">
                    <a class="text-decoration-none text-dark" href="details.php?mid='.$media["mid"].'">
                        <div class="card h-100 hover">
                            <img src="uploads/'.$media["image"].'" class="card-img-top img-responsive alt="">
                            <div class="card-body">
                                <h5 class="card-title">'.$media["title"].'</h5>
                            </div>                     
                        </div>
                    </a>
                </div>';
            }
        ?>   
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-3">
        <?php
            $numberOfLinks = ceil($row_count/$item_size);
            for ($i = 0; $i < $numberOfLinks; $i++) {
                $index = $i*$item_size;
                $page = $i+1;
                echo '<li class="page-item"><a class="page-link" href="index.php?show='.$index.'">'.$page.'</a></li>';
            }
        ?>
        </ul>
    </nav>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>