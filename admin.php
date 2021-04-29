<?php
session_start();
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/MediaDbObject.php';

$mediaDbo = new MediaDbObject(new Database());
$media = $mediaDbo->getItems();
?>

<?php
$page_title = "National Libray of CRUD | Admin";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">ISBN</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="modify.php?action=add" class="bi bi-plus-square fs-4 text-success "></a></td>
                <td colspan="4">Add new media item</td>     
            </tr>
            <?php 
                foreach ($media as $item) {
                    echo '
                        <tr>
                            <td>
                                <a href="modify.php?action=delete&mid='.$item["mid"].'" class="bi bi-dash-square text-danger fs-4"></a>
                                <a href="modify.php?action=modify&mid='.$item["mid"].'" class="bi bi-pencil-square text-secondary fs-4"></a>
                            </td>
                            <td>'.$item["mid"].'</td>
                            <td>'.$item["title"].'</td>
                            <td>'.$item["isbn"].'</td>
                        </tr>';
                }
            ?>   
        </tbody>
    </table>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>