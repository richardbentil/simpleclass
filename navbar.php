<nav class="navbar navbar-expand-lg navbar-light" id="frontnavbar">
  <div class="container">
  <a class="navbar-brand p-0" href="./">
    <img src="images/simpleclass-logo.png" width="40" alt="simpleclass-logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) { ?>
        <li class="nav-item">
          <a class="btn btn-outline btn-primary" style="color:white!important;" href="dashboard.php">Dashboard</a>
        </li>
        <?php }else{ ?>
        <li class="nav-item mr-2">
          <a class="nav-link font-weight-bold" href="./?page=login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link font-weight-bold" href="./?page=signup">Sign Up</a>
        </li>
      <?php } ?>
    </ul>
  </div>
  </div>
</nav>