<?php
    require_once 'functions/db_connect.php';

    $sql = "SELECT * FROM dishes";
    $result = $mysqli->query($sql);
?>

<div class="container mt-3"> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">description</th>
                <th scope="col">img_url</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while ($dish = $result->fetch_assoc()) {
                    echo '
                        <tr>
                            <td>'.$dish["id"].'</td>
                            <td>'.$dish["name"].'</td>
                            <td>'.$dish["price"].'</td>
                            <td>'.$dish["description"].'</td>
                            <td>'.$dish["img_url"].'</td>
                            <td><a href="#" class="btn btn-danger">-</a></td>
                        </tr>';
                }
            ?>   
            <tr>
                <form action="#" method="GET">
                    <td></td>
                    <td><input type="text" class="form-control" name="name"></td>
                    <td><input type="text" class="form-control" name="price"></td>
                    <td><input type="text" class="form-control" name="description"></td>
                    <td><input type="url" class="form-control" name="img_url"></td>
                    <td><input type="submit" name="submit" class="btn btn-success" value="+"></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>