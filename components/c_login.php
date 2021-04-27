<?php
    require_once 'actions/db_connect.php';
    require_once 'actions/functions.php';

    if (isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    }
    if (isset($_SESSION['admin'])) {
        header("Location: admin.php");
    }
    
    $mailErr = "";
    $pwErr = "";
    $email = "";

    if(isset($_GET["email"])) {
        $email = $_GET["email"];
    }

    if(isset($_POST["login"])) doLogin();

    function doLogin() {
        global $email;
        $email = sanitizeInput($_POST["email"]);
        $pw = sanitizeInput($_POST["pw"]);

        if (empty($pw)) {
            global $pwErr;
            $pwErr = "Password can't be empty.";
            return;
        }

        $sql = "SELECT uid, fname, password, status 
                FROM user 
                WHERE email = '$email'";

        global $mysqli;
        $result = $mysqli->query($sql);
        $mysqli->close();

        $result ?: exitGracefully();
        
        if ($result->num_rows == 0) {
            global $mailErr;
            $mailErr = "Username not found.";
            $email = "";
            return;
        }

        // Houston we have a problem
        if ($result->num_rows > 1) exitGracefully();
        
        $row = $result->fetch_assoc();
        if(!password_verify($pw, $row['password'])) {
            global $pwErr;
            $pwErr = "Wrong password. Please try again.";
            return;
        }

        if($row['status'] == 'admin'){
            $_SESSION['admin'] = $row['uid']; 
            $_SESSION['name'] = $row['fname'];      
            header( "Location: admin.php");}
        else {
            $_SESSION['user'] = $row['uid']; 
            $_SESSION['name'] = $row['fname'];    
            header( "Location: index.php");
        }   
    }
?>
<p class="h2">Sign In</p>
<form method="post" class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <div class="col-md-7">
        <label for="inputMail" class="form-label">Username</label>
        <input type="email" autocomplete="off" name="email" id="inputMail" class="form-control" value="<?php echo $email; ?>" required/>
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