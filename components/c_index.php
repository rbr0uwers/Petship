<?php
    require_once 'actions/db_connect.php';
    $item_size = 12;

    if(isset($_GET["show"])){
        $offset = $_GET["show"];   
    } else {
        $offset = 0;
    }

    $cnt_sql = "SELECT count(*) FROM media";
    $cnt_result = $mysqli->query($cnt_sql);
    $row_count = ($cnt_result->fetch_all())[0][0];

    $sql = "SELECT mid,title,image,isAvailable FROM media LIMIT $item_size OFFSET $offset";
    $result = $mysqli->query($sql);

    $mysqli->close();
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    </ol>
</nav>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">   
    <?php
        while ($media = $result->fetch_assoc()) {
            echo '
            <div class="col">
                <a class="text-decoration-none text-dark" href="details.php?mid='.$media["mid"].'">
                    <div class="card h-100 hover">
                        <img src="'.$media["image"].'" class="card-img-top img-responsive alt="">
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
        $numberOfLinks = floor($row_count/$item_size) + 1;
        for ($i = 0; $i < $numberOfLinks; $i++) {
            $index = $i*$item_size;
            $page = $i+1;
            echo '<li class="page-item"><a class="page-link" href="index.php?show='.$index.'">'.$page.'</a></li>';
        }
    ?>
    </ul>
</nav>