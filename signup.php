<?php
session_start();
require_once 'actions/db_connect.php';
require_once 'actions/functions.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
}

$pwErr = "";
$mailErr = "";
$fNameErr = "";
$lNameErr = "";
$email = "";
$fName = "";
$lName = "";

if(isset($_POST["signup"])) createUser();

function createUser() {
    global $fName;
    $fName = sanitizeInput($_POST["fName"]);
    if (strlen($fName) < 3) {
        global $fNameErr;
        $fNameErr = "Minimum character 3 characters are required.";
        return;
    }

    global $lName;
    $lName = sanitizeInput($_POST["lName"]);
    if (strlen($lName) < 3) {
        global $lNameErr;
        $lNameErr = "Minimum character 3 characters are required.";
        return;
    }

    global $email;
    $email = sanitizeInput($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        global $mailErr;
        $mailErr = "Please enter valid email address.";
        return;
    }

    $sql = "SELECT email
            FROM user 
            WHERE email = '$email'";

    global $mysqli;
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        global $email;
        header("location: login.php?email={$email}");
        exit; 
    }

    $pw = sanitizeInput($_POST["pw"]);
    $pwrepeat = sanitizeInput($_POST["pwrepeat"]);
    if ($pw != $pwrepeat) {
        global $pwErr;
        $pwErr = "Passwords are not the same.";
        return;
    }
    if (strlen($pw) < 8) {
        global $pwErr;
        $pwErr = "Minimum character 8 characters are required.";
        return;
    }

    $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (fName, lName, email, password, status)
            VALUES ('$fName', '$lName', '$email', '$hashed_pw', 'user')";

    global $mysqli;
    $result = $mysqli->query($sql);
    $result ?: exitGracefully();

    $new_mid = $mysqli->insert_id;
    $mysqli->close();

    $_SESSION['user'] = $new_mid; 
    $_SESSION['name'] = $fName;    
    header( "Location: index.php");
}
?>

<?php
$page_title = "National Libray of CRUD | Signup";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <p class="h2">Sign Up</p>
    <form method="post" class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="col-md-6">
            <label for="inputFname" class="form-label">First name</label>
            <input type="text" class="form-control" name="fName" id="inputFname" value="<?php echo $fName ?>" required>
            <div class="form-text text-danger"><?php echo $fNameErr; ?></div>
        </div>
        <div class="col-md-6">
            <label for="inputLname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lName" id="inputLname" value="<?php echo $lName ?>" required>
            <div class="form-text text-danger"><?php echo $lNameErr; ?></div>
        </div>
        <div class="col-md-6">
            <label for="inputMail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputMail" value="<?php echo $email ?>" required>
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