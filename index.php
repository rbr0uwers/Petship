<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Libray of CRUD</title>

    <?php readfile('components/boot.html');?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php readfile('components/nav.html'); ?>
    <?php readfile('components/hero.html'); ?>
    <div class="container mt-3"> 
        <?php include 'components/c_index.php'; ?>
    </div>
    <?php readfile('components/footer.html'); ?>
</body>
</html>