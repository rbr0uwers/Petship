<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dannys Delicious CRUDs | Oooops.</title>

    <?php readfile('components/boot.html');?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php readfile('components/nav.html'); ?>
    <?php readfile('components/hero.html'); ?>
    <div class="container">  
        <div class="mt-3 mb-3">
            <h1>Oooops.</h1>
        </div>
        <div class="alert alert-warning" role="alert">
            <p>Something went wrong. Please <a href="index.php" class="alert-link">go back</a> and try again.</p>
        </div>
    </div>
</body>
</html>