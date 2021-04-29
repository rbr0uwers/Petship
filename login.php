<?php
session_start();
require_once 'functions/Database.php';
require_once 'functions/DbObject.php';
require_once 'functions/UserDbObject.php';
require_once 'functions/Input.php';
require_once 'functions/UserInput.php';
require_once 'functions/Helper.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

$mailErr = $pwErr = "";
$userInput = new UserInput();

if(isset($_GET["email"])) $userInput->setEmail($_GET["email"]);
if(isset($_POST["login"])) doLogin();

function doLogin() {
    global $userInput;
    $userInput->setEmail($_POST["email"]);
    $userInput->setPassword($_POST["pw"]);

    if (empty($userInput->getPassword())) {
        global $pwErr;
        $pwErr = "Password can't be empty.";
        return;
    }

    $userDbo = new UserDbObject(new Database());
    $result = $userDbo->getUserbyEmail($userInput);

    if (count($result) == 0) {
        global $mailErr;
        $mailErr = "Username not found.";
        $userInput->setEmail("");
        return;
    }

    // Houston we have a problem
    if (count($result) > 1) exitGracefully();
 
    if(!password_verify($userInput->getPassword(), $result[0]['password'])) {
        global $pwErr;
        $pwErr = "Wrong password. Please try again.";
        return;
    }

    if($result['status'] == 'admin'){
        $_SESSION['admin'] = $result[0]['uid']; 
        $_SESSION['name'] = $result[0]['fName'];      
        header( "Location: admin.php");
    } else {
        $_SESSION['user'] = $result[0]['uid']; 
        $_SESSION['name'] = $result[0]['fName'];    
        header( "Location: index.php");
    }   
}
?>
<?php
$page_title = "National Libray of CRUD | Login";
include_once "components/layout_top.php";
?>

<!-- Content -->
<div class="container mt-3"> 
    <p class="h2">Sign In</p>
    <form method="post" class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div class="col-md-7">
            <label for="inputMail" class="form-label">Username</label>
            <input type="email" autocomplete="off" name="email" id="inputMail" class="form-control" value="<?php echo $userInput->getEmail(); ?>" required/>
            <div class="form-text text-danger"><?php echo $mailErr; ?></div>
        </div>
        <div class="col-md-7">
            <label for="inputPass" class="form-label">Password</label>
            <input type="password" name="pw"  class="form-control" id="inputPass" minlength="6" required/>
            <div class="form-text text-danger"><?php echo $pwErr; ?></div>
        </div>
        <div class="col-12 mt-3 mb-3">
            <button button class="btn btn-block btn-primary" type="submit" name="login">Sign In</button>
        </div>
        <div class="col-12 mb-5">
            <p>No account yet? Sign up <a href="signup.php">here.</a></p>
        </div>
    </form>
</div>
<!-- End of Content -->

<?php
include_once "components/layout_bottom.php";
?>