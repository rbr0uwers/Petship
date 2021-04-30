<?php
session_start();
require_once 'functions/Helper.php';
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/MediaDbObject.php';
require_once 'functions/AuthorDbObject.php';
require_once 'functions/PublisherDbObject.php';
require_once 'functions/Input.php';
require_once 'functions/MediaInput.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} 
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if(!isset($_GET["action"]) || ($_GET["action"] != "modify" && $_GET["action"] != "add" && $_GET["action"] != "delete")) exitGracefully();

if ($_GET["action"] == "modify" || $_GET["action"] == "delete") {
    if(!isset($_GET["mid"])) exitGracefully();

    $mediaInput = new MediaInput();
    $mediaInput->setId(($_GET["mid"]));
    $mediaDbo = new MediaDbObject(new Database());
    $media = $mediaDbo->getMediabyId($mediaInput);

    if (count($media) == 0) exitGracefully();

    $media_authors = $mediaDbo->getAuthorsByMediaId($mediaInput); 
} 

// Make Form fields read-only when in delete mode
$disableText = $_GET["action"] == "delete" ? "disabled" : "";

$authorDbo = new AuthorDbObject(new Database());
$author = $authorDbo->getItems();
$publisherDbo = new PublisherDbObject(new Database());
$publisher = $publisherDbo->getItems();
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
            <input type="hidden" name="mid" value="<?php echo $media[0]['mid'] ?? ''; ?>">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="inputTitle" value="<?php echo $media[0]['title'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" id="inputIsbn" value="<?php echo $media[0]['isbn'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="description" id="inputDescription" rows="3" required <?php echo $disableText; ?>><?php echo $media[0]['description'] ?? ''; ?></textarea>
        </div>
        <div class="col-md-12">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input type= "hidden" name= "image" value="<?php echo $media[0]['image'] ?? ''; ?>" />
            <label for="inputUrl" class="form-label">Image File</label>
            <input type="file" class="form-control" name="image" id="inputUrl" <?php echo $disableText; ?>>
            <div class="form-text">Maximum file size: 500KB. Allowed extensions: png or jpg.</div>
        </div>
        <div class="col-md-6">
            <label for="inputPubDate" class="form-label">Publication Date</label>
            <input type="date" class="form-control" name="pub_date" id="inputPubDate" value="<?php echo $media[0]['pub_date'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputType" class="form-label">Media-Type</label>
            <select id="inputType" class="form-select" name="type" <?php echo $disableText; ?> required>
                <option value="book" <?php if (isset($media)) echo $media[0]['type'] == 'book' ? 'selected' : ''; ?>>Book</option>
                <option value="cd" <?php if (isset($media)) echo $media[0]['type'] == 'cd' ? 'selected' : ''; ?>>CD</option>
                <option value="dvd" <?php if (isset($media)) echo $media[0]['type'] == 'dvd' ? 'selected' : ''; ?>>DVD</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputPublisher" class="form-label">Publisher</label>
            <select id="inputType" class="form-select" name="pid" <?php echo $disableText; ?> required>
                <?php 
                    foreach($publisher as $item){
                        $selectedString = $item["pid"] == $media[0]["pid"] ? "selected" : "";
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
                        foreach($media_authors as $media_author_item) {
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
                <input class="form-check-input" type="checkbox" name="isAvailable" value="true" id="availCheck" <?php if (isset($media)) echo $media[0]['isAvailable'] ? "checked" : ""; ?> <?php echo $disableText; ?>> 
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