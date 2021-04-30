<?php
session_start();
require_once 'functions/Globals.php';
require_once 'functions/Database.php';
require_once 'functions/dbobject/DbObject.php';
require_once 'functions/dbobject/PetDbObject.php';
require_once 'functions/dbobject/UserDbObject.php';
require_once 'functions/input/Input.php';
require_once 'functions/input/PetInput.php';

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
    if(!isset($_GET["id"])) exitGracefully();

    $pet = new PetInput();
    $pet->setId(($_GET["id"]));
    $petDbObject = new PetDbObject(new Database());
    $petResult = $petDbObject->selectPetAddressUserItemsById($pet);

    if (count($petResult) == 0) exitGracefully();
} 

// Make Form fields read-only when in delete mode
$disableText = $_GET["action"] == "delete" ? "disabled" : "";

$userDbObject = new UserDbObject(new Database());
$ownerResult = $userDbObject->selectAllItems();
?>
<?php
$page_title = "Petship | Modify";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo ucfirst($_GET["action"]); ?> Pet</li>
        </ol>
    </nav>
    <form class="row g-3 needs-validation" method="post" action="action.php" enctype="multipart/form-data">
        <div class="col-md-6">
            <!-- Send ID to identify pet item to modify later -->
            <input type="hidden" name="id" value="<?php echo $petResult[0]['pid'] ?? ''; ?>">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="inputName" value="<?php echo $petResult[0]['name'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputBreed" class="form-label">Breed</label>
            <input type="text" class="form-control" name="breed" id="inputBreed" value="<?php echo $petResult[0]['breed'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-12">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="description" id="inputDescription" rows="3" required <?php echo $disableText; ?>><?php echo $petResult[0]['description'] ?? ''; ?></textarea>
        </div>
        <div class="col-md-6">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input type= "hidden" name= "image" value="<?php echo $petResult[0]['image'] ?? ''; ?>" />
            <label for="inputUrl" class="form-label">Image File</label>
            <input type="file" class="form-control" name="image" id="inputUrl" <?php echo $disableText; ?>>
            <div class="form-text">Maximum file size: 500KB. Allowed extensions: png or jpg.</div>
        </div>
        <div class="col-md-3">
            <label for="inputBirthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" name="birthdate" id="inputBirthdate" value="<?php echo $petResult[0]['birthdate'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-3">
            <label for="inputSize" class="form-label">Size</label>
            <select id="inputSize" class="form-select" name="size" <?php echo $disableText; ?> required>
                <option value="small" <?php if (isset($petResult)) echo $petResult[0]['size'] == 'small' ? 'selected' : ''; ?>>small</option>
                <option value="large" <?php if (isset($petResult)) echo $petResult[0]['size'] == 'large' ? 'selected' : ''; ?>>large</option>
            </select>
        </div>
        <div class="w-100"></div>
        <!-- Send Address ID to identify address item later -->
        <input type="hidden" name="aid" value="<?php echo $petResult[0]['aid'] ?? ''; ?>">
        <div class="col-md-6">
            <label for="inputStreet" class="form-label">Street</label>
            <input type="text" class="form-control" name="street" id="inputStreet" value="<?php echo $petResult[0]['street'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" name="zip" id="inputZip" value="<?php echo $petResult[0]['zip'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="inputCity" value="<?php echo $petResult[0]['city'] ?? ''; ?>" required <?php echo $disableText; ?>>
        </div>
        <div class="w-100"></div>
        <div class="col-md-6">
            <label for="inputOwner" class="form-label">Current Owner</label>
            <select id="inputType" class="form-select" name="uid" <?php echo $disableText; ?>>
                <option value="NULL">None</option>'
                <?php 
                    foreach($ownerResult as $item){
                        $selectedString = $item["id"] == $petResult[0]["uid"] ? "selected" : "";
                        echo '<option value="'.$item["id"].'"'.$selectedString.'>'.$item["fName"].' '.$item["lName"].'</option>';
                    }
                ?>
            </select>
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