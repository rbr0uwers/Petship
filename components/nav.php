<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img class="logo" src="img/logo.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav w-100">
        <a class="nav-link fs-5" aria-current="page" href="index.php">Home</a>
        <?php if(isset($_SESSION['admin'])) echo '<a class="nav-link fs-5" href="admin.php">Admin</a>' ?>
        <a class="nav-link fs-5 ms-auto" aria-current="page" href="login.php"><i class="bi bi-person-circle"></i> 
          <?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ?></a>
      </div>
    </div>
  </div>
</nav>