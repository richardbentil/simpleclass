<?php 
require_once('controls/initialize.php');
include_once('header.php'); 
if (isset($_SESSION['userEmail'])) {
  
}else{
  header('Location: index.php');
}
?>
<link rel="stylesheet" href="dist/css/dashboard-dist.css">
      <nav class="navbar navbar-dark fixed-top navbar-expand bg-primary flex-md-nowrap p-0 text-white">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">
        <img src="images/simpleclass-logo-white.png" width="25" alt="simple_class_logo">  
       </a>
        <ul class="navbar-nav px-3 ml-auto">
          <li class="nav-item text-nowrap">
            <a class="nav-link font-weight-normal" onclick="logout()" href=""> <span class="mr-4">
              <?php if (isset($_SESSION['adminPassword']) || isset($_SESSION['userPassword'])) {
                echo $_SESSION['userEmail'];
              } ?>
            </span> Sign Out <i class="fa fa-logout"></i> </a>
          </li>
        </ul>
      </nav>
      
  <div class="container-fluid">
    <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="dashboard.php"> <i class="fa fa-dashboard mr-1"></i> Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <?php if (isset($_SESSION['userPassword'])) { ?>
                  <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials"><i class="fa fa-file mr-1"></i>  Materials
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=courses"><i class="fa fa-list mr-1"></i> Courses
                  </a>
                </li>
                <?php }elseif (isset($_SESSION['adminPassword'])) { ?>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=courses"><i class="fa fa-list mr-1"></i> Courses
                  </a>
                </li>
                <!--
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=students"> <i class="fa fa-users mr-1"></i> Students
                  </a>
                </li>
                -->
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.php?page=materials"><i class="fa fa-file mr-1"></i> Materials
                  </a>
                </li> 
                
                <?php } ?> 
              </ul>
            </div>
          </nav>
      
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 my-2">
              <?php
                get_page_dashboard();
              ?>
      </main>
    </div>
  </div>
  <?php include_once('footer.php') ?>
  