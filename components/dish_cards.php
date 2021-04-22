<?php
    require_once 'actions/db_connect.php';
    $item_size = 9;

    if(isset($_GET["show"])){
        $offset = $_GET["show"];   
    } else {
        $offset = 0;
    }

    $cnt_sql = "SELECT count(*) FROM dishes";
    $cnt_result = $mysqli->query($cnt_sql);
    $row_count = ($cnt_result->fetch_all())[0][0];

    $sql = "SELECT * FROM dishes LIMIT $item_size OFFSET $offset";
    $result = $mysqli->query($sql);

    $mysqli->close();
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
    <div class="d-flex justify-content-evenly mx-auto w-50 mt-3">
        <?php
            $numberOfLinks = floor($row_count/$item_size) + 1;
            for ($i = 0; $i < $numberOfLinks; $i++) {
                $index = $i*$item_size;
                $page = $i+1;
                echo '<a class="m-2" href="index.php?show='.$index.'">Page '.$page.'</a>';
            }
        ?>
    </div>
</div>