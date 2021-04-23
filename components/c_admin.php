<?php
    require_once 'actions/db_connect.php';
    $sql = "SELECT * FROM dishes";
    $fetch_result = $mysqli->query($sql);
    $mysqli->close();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">description</th>
            <th scope="col">img_url</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="modify.php" method="GET">
                <td><input type="text" class="form-control" name="name" placeholder="name"></td>
                <td><input type="text" class="form-control" name="price" placeholder="price"></td>
                <td><input type="text" class="form-control" name="description" placeholder="description"></td>
                <td><input type="url" class="form-control" name="img_url" placeholder="url"></td>
                <td><button type="submit" name="action" class="btn btn-success btn-sm" value="add"><i class="bi bi-plus-square"></i></button></td>
            </form>
        </tr>
        <?php 
            while ($dish = $fetch_result->fetch_assoc()) {
                echo '
                    <tr>
                        <td>'.$dish["name"].'</td>
                        <td>'.$dish["price"].'</td>
                        <td>'.$dish["description"].'</td>
                        <td>'.$dish["img_url"].'</td>
                        <td>
                            <a href="modify.php?action=modify&id='.$dish["id"].'" class="btn btn-danger btn-sm"><i class="bi bi-dash-square"></i></a>
                            <a href="delete.php?id='.$dish["id"].'" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>';
            }
        ?>   
    </tbody>
</table>
