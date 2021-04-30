<?php
session_start();
require_once 'functions/Globals.php';
require_once 'functions/Database.php';
require_once 'functions/dbobject/DbObject.php';
require_once 'functions/dbobject/PetDbObject.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} 
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$petDbObject = new PetDbObject(new Database());
$pets = $petDbObject->selectAllItems();
?>

<?php
$page_title = "Petship | Admin";
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
                <th scope="col">Name</th>
                <th scope="col">Breed</th>   
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="modify.php?action=add" class="bi bi-plus-square fs-4 text-success "></a></td>
                <td colspan="4">Add new pet</td>     
            </tr>
            <?php 
                foreach ($pets as $item) {
                    echo '
                        <tr>
                            <td>
                                <a href="modify.php?action=delete&id='.$item["id"].'" class="bi bi-dash-square text-danger fs-4"></a>
                                <a href="modify.php?action=modify&id='.$item["id"].'" class="bi bi-pencil-square text-secondary fs-4"></a>
                            </td>
                            <td>'.$item["id"].'</td>
                            <td>'.$item["name"].'</td>
                            <td>'.$item["breed"].'</td>
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