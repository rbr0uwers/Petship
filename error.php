<?php
session_start();
$page_title = "National Libray of CRUD | Oooops.";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        </ol>
    </nav>
    <div class="mt-3 mb-3">
        <h1>Oooops.</h1>
    </div>
    <div class="alert alert-warning" role="alert">
        <p>Something went wrong. Please <a href="index.php" class="alert-link">go back</a> and try again.</p>
    </div>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>
