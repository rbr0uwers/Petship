<?php
session_start();
require_once 'functions/Globals.php';
require_once 'functions/Database.php';
require_once 'functions/dbobject/DbObject.php';
require_once 'functions/dbobject/UserDbObject.php';
require_once 'functions/input/Input.php';
require_once 'functions/input/UserInput.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} 
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

$pwErr = $mailErr = $fNameErr = $lNameErr = "";
$userInput = new UserInput();
if(isset($_POST["signup"])) createUser();

function createUser() {
    global $userInput;
    $userInput->setfName($_POST["fName"]);
    if ($userInput->error->hasError) {
        global $fNameErr;
        $fNameErr = $userInput->error->message;
        return;
    }

    $userInput->setlName($_POST["lName"]);
    if ($userInput->error->hasError) {
        global $lNameErr;
        $lNameErr = $userInput->error->message;
        return;
    }

    $userInput->setEmail($_POST["email"]);
    if ($userInput->error->hasError) {
        global $mailErr;
        $mailErr = $userInput->error->message;
        return;
    }

    $userDbo = new UserDbObject(new Database());
    $result = $userDbo->getUserbyEmail($userInput);

    if (count($result) == 1) {
        header("location: login.php?email={$userInput->getEmail()}");
        exit; 
    }

    $userInput->setPasswords($_POST["pw"], $_POST["pwrepeat"]);
    if ($userInput->error->hasError) {
        global $pwErr;
        $pwErr = $userInput->error->message;
        return;
    }

    $new_mid = $userDbo->createNewUser($userInput);
    $_SESSION['user'] = $new_mid; 
    $_SESSION['name'] = $userInput->getfName();    
    header( "Location: index.php");
}
?>

<?php
$page_title = "Petship | Signup";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <p class="h2">Sign Up</p>
    <form method="post" class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="col-md-6">
            <label for="inputFname" class="form-label">First name</label>
            <input type="text" class="form-control" name="fName" id="inputFname" value="<?php if (!is_null($userInput->getfName())) echo $userInput->getfName(); ?>" required>
            <div class="form-text text-danger"><?php echo $fNameErr; ?></div>
        </div>
        <div class="col-md-6">
            <label for="inputLname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lName" id="inputLname" value="<?php if (!is_null($userInput->getlName())) echo $userInput->getlName(); ?>" required>
            <div class="form-text text-danger"><?php echo $lNameErr; ?></div>
        </div>
        <div class="col-md-6">
            <label for="inputMail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputMail" value="<?php if (!is_null($userInput->getEmail())) echo $userInput->getEmail(); ?>" required>
            <div class="form-text text-danger"><?php echo $mailErr; ?></div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-6">
            <label for="inputPwd" class="form-label">Password</label>
            <input type="password" class="form-control" name="pw" id="inputPwd" minlength="8">
            <div class="form-text text-danger"><?php echo $pwErr; ?></div>
            <div class="form-text">Minimum 8 characters</div>
        </div>
        <div class="col-md-6">
            <label for="inputPwdRepeat" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" name="pwrepeat" id="inputPwdRepeat" minlength="8">  
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-success" name="signup" >Create Account</button>
            <a class="btn btn-secondary" href="login.php">Sign In</a>
        </div>
    </form>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>