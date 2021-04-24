<?php
    require_once 'actions/db_connect.php';
    require_once 'actions/functions.php';

    $sql = "SELECT mid,title,isbn FROM media";
    $fetch_result = $mysqli->query($sql);
    
    if (!$fetch_result) exitGracefully();
    
    $mysqli->close();
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
    </ol>
</nav>
<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">ISBN</th>   
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="modify.php?action=add" class="bi bi-plus-square fs-4 text-success "></a></td>
            <td colspan="4">Add new media item</td>     
        </tr>
        <?php 
            while ($media = $fetch_result->fetch_assoc()) {
                echo '
                    <tr>
                        <td>
                            <a href="modify.php?action=delete&mid='.$media["mid"].'" class="bi bi-dash-square text-danger fs-4"></a>
                            <a href="modify.php?action=modify&mid='.$media["mid"].'" class="bi bi-pencil-square text-secondary fs-4"></a>
                        </td>
                        <td>'.$media["mid"].'</td>
                        <td>'.$media["title"].'</td>
                        <td>'.$media["isbn"].'</td>
                    </tr>';
            }
        ?>   
    </tbody>
</table>
