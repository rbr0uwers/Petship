<?php
    require_once 'actions/db_connect.php';

    if(isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            $id = $_GET["id"];
            $sql = "DELETE FROM dishes WHERE id = $id";
            $del_result = $mysqli->query($sql);
        } elseif ($_GET["action"] == "add") {
            if ($_GET["name"] && $_GET["price"] && $_GET["description"] && $_GET["img_url"]) {
                $name = $_GET["name"];
                $price = $_GET["price"];
                $description = $_GET["description"];
                $img_url = $_GET["img_url"];

                $sql = "INSERT INTO dishes(name, price, description, img_url) VALUES ('$name', '$price', '$description', '$img_url')";
                $del_result = $mysqli->query($sql);
            }
        }
    }

    $sql = "SELECT * FROM dishes";
    $fetch_result = $mysqli->query($sql);

    $mysqli->close();
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
                while ($dish = $fetch_result->fetch_assoc()) {
                    echo '
                        <tr>
                            <td>'.$dish["id"].'</td>
                            <td>'.$dish["name"].'</td>
                            <td>'.$dish["price"].'</td>
                            <td>'.$dish["description"].'</td>
                            <td>'.$dish["img_url"].'</td>
                            <td><a href="admin.php?action=delete&id='.$dish["id"].'" class="btn btn-danger">-</a></td>
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
                    <td><button type="submit" name="action" class="btn btn-success" value="add">+</button></td>
                </form>
            </tr>
        </tbody>
    </table>
</div>