<?php
session_start();
require_once 'actions/db_connect.php';
require_once 'actions/functions.php';

if(!isset($_GET["action"]) || ($_GET["action"] != "modify" && $_GET["action"] != "add" && $_GET["action"] != "delete")) exitGracefully();

if ($_GET["action"] == "modify" || $_GET["action"] == "delete") {
    if(!isset($_GET["mid"])) exitGracefully();

    $mid = $_GET["mid"];
    $sql = "SELECT * FROM media WHERE mid=$mid";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0) exitGracefully();

    $media = $result->fetch_all(MYSQLI_ASSOC)[0];
    $mid = $media['mid'];
    $sql_author_media = "SELECT aid
                            FROM media 
                            INNER JOIN media_author
                            ON media.mid = media_author.mid
                            WHERE $mid = media_author.mid";

    $result = $mysqli->query($sql_author_media);
    $media_author = $result->fetch_all(MYSQLI_ASSOC);   
} 

// Make Form fields read-only when in delete mode
$disableText = $_GET["action"] == "delete" ? "disabled" : "";

$sql_author = "SELECT * FROM author";
$result = $mysqli->query($sql_author);
$author = $result->fetch_all(MYSQLI_ASSOC);

$sql_publisher = "SELECT pid,name FROM publisher";
$result = $mysqli->query($sql_publisher);
$publisher = $result->fetch_all(MYSQLI_ASSOC);

$mysqli->close();
?>
<?php
$page_title = "National Libray of CRUD | Modify";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo ucfirst($_GET["action"]); ?> Media Item</li>
        </ol>
    </nav>
    <form class="row g-3 needs-validation" method="post" action="action.php" enctype="multipart/form-data">
        <div class="col-md-6">
            <!-- Send ID to identify media item to modify later -->
            <input type="hidden" name="mid" value="<?php echo $media['mid'] ?? ''; ?>">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="inputTitle" value="<?php echo $media['title'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" id="inputIsbn" value="<?php echo $media['isbn'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="description" id="inputDescription" rows="3" required <?php echo $disableText; ?>><?php echo $media['description'] ?? ''; ?></textarea>
        </div>
        <div class="col-md-12">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input type= "hidden" name= "image" value="<?php echo $media['image'] ?? ''; ?>" />
            <label for="inputUrl" class="form-label">Image File</label>
            <input type="file" class="form-control" name="image" id="inputUrl" <?php echo $disableText; ?>>
            <div class="form-text">Maximum file size: 500KB. Allowed extensions: png or jpg.</div>
        </div>
        <div class="col-md-6">
            <label for="inputPubDate" class="form-label">Publication Date</label>
            <input type="date" class="form-control" name="pub_date" id="inputPubDate" value="<?php echo $media['pub_date'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputType" class="form-label">Media-Type</label>
            <select id="inputType" class="form-select" name="type" <?php echo $disableText; ?> required>
                <option value="book" <?php if (isset($media)) echo $media['type'] == 'book' ? 'selected' : ''; ?>>Book</option>
                <option value="cd" <?php if (isset($media)) echo $media['type'] == 'cd' ? 'selected' : ''; ?>>CD</option>
                <option value="dvd" <?php if (isset($media)) echo $media['type'] == 'dvd' ? 'selected' : ''; ?>>DVD</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputPublisher" class="form-label">Publisher</label>
            <select id="inputType" class="form-select" name="pid" <?php echo $disableText; ?> required>
                <?php 
                    foreach($publisher as $item){
                        $selectedString = $item["pid"] == $media["pid"] ? "selected" : "";
                        echo '<option value="'.$item["pid"].'"'.$selectedString.'>'.$item["name"].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputAuthor" class="form-label">Author(s)</label>
            <select class="form-select" multiple size="3" id="inputAuthor" name="aid[]" <?php echo $disableText; ?> required>
                <?php 
                    foreach($author as $item){
                        $selectedString = "";
                        foreach($media_author as $media_author_item) {
                            if ($item["aid"] == $media_author_item["aid"]) {
                                $selectedString = "selected";
                                break;
                            }
                        }
                        echo '<option value="'.$item["aid"].'"'.$selectedString.'>'.$item["fname"].' '.$item["lname"].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-12">
            <div class="form-check">
                <label class="form-check-label" for="availCheck">Available</label>
                <input class="form-check-input" type="checkbox" name="isAvailable" value="true" id="availCheck" <?php if (isset($media)) echo $media['isAvailable'] ? "checked" : ""; ?> <?php echo $disableText; ?>> 
            </div>
        </div>
        <div class="col-12">
            <?php 
                switch ($_GET["action"]) {
                    case "delete": 
                        echo '<button type="submit" class="btn btn-danger" name="action" value="delete">Delete Item</button>';
                        break;
                    case "add": 
                        echo '<button type="submit" class="btn btn-success" name="action" value="add">Add new Item</button>';
                        break;
                    case "modify": 
                        echo '<button type="submit" class="btn btn-success" name="action" value="modify">Update Item</button>';
                        break;
                }
            ?>
            <a class="btn btn-secondary" href="admin.php">Cancel</a>
        </div>
    </form>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>