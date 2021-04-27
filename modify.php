<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Libray of CRUD | Modify</title>

    <?php readfile('components/boot.html');?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'components/nav.php'; ?>
    <?php readfile('components/hero.html'); ?>
    <div class="container mt-3"> 
        <?php include 'components/c_modify.php'; ?>
    </div>
    <?php readfile('components/footer.html'); ?>
    <?php readfile('components/bootjs.html'); ?>
</body>
</html>