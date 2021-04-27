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
        		<?php 
					if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
          				echo '
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle bi bi-person-circle fs-5 nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> '.$_SESSION["name"].'</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li><a class="dropdown-item" href="logout.php?logout">Logout</a></li>
								</ul>
							</div>';
					} else {
						echo '<a class="nav-link fs-5 ms-auto bi bi-person-circle" href="login.php"></a>';
					}
				?>
			</div>
		</div>
	</div>
</nav>