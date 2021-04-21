<?php
    require_once 'functions/db_connect.php';

    $sql = "SELECT * FROM dishes";
    $result = $mysqli->query($sql);
?>

<div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">   
        <?php
            while ($dish = $result->fetch_assoc()) {
                echo '
                <div class="col">
                    <div class="card h-100">
                        <img src="'.$dish["img_url"].'" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">'.$dish["name"].'</h5>
                            <p class="card-text">'.$dish["description"].'</p>
                        </div>                
                        <div class="card-footer">
                            <p class="fs-5 text-end mb-0">'.$dish["price"].' EUR</p>
                        </div>                  
                    </div>
                </div>';
            }
        ?>   
    </div>
</div>