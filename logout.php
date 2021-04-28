<?php
session_start();
// should never happen as logout is only seen by logged in users
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if(isset($_GET['logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    unset($_SESSION['name']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>