<div class="col-12 p-0 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h5>Dashboard</h5>
                <div class="btn-toolbar mb-2 mb-md-0">
                <?php if (isset($_SESSION['adminPassword'])) { ?>
                  <div class="btn-group mr-2">
                    <a href="dashboard.php?page=materials" href="#" class="btn btn-sm btn-custom-outline"> <i class="fa fa-plus"></i> Upload Course Material</a>
                  </div>
                <?php } ?>
                </div>
</div>
<div class="jumbotron">
                <h5 class="display-7">Welcome to Simpleclass</h5>
                <?php if (isset($_SESSION['adminPassword'])) { ?>
                <p class="lead text-muted">You can get started with this quick actions. First create a course before uploading course materials.</p>
                <?php } else {?>
                  <p class="lead text-muted">You can get started with this quick actions. Register for a course and have access to the materials.</p>
                <?php }?>
                <div class="col-md-12 col-sm-12 p-0">
                    <?php if (isset($_SESSION['adminPassword'])) { ?>
                      <a class="btn btn-primary m-1" href="dashboard.php?page=courses" role="button"><i class="fa fa-plus"></i> Create Course</a>
                      <a class="btn btn-primary m-1" href="dashboard.php?page=materials" role="button"><i class="fa fa-plus"></i> Upload Materials</a>
                      <!--
                      <a class="btn btn-primary m-1" href="dashboard.php?page=students" role="button"> Students</a>
                    -->
                    <?php } elseif (isset($_SESSION['userPassword']) || isset($_SESSION['adminPassword'])) { ?>
                      <a class="btn btn-primary m-1" href="dashboard.php?page=materials" role="button"> Materials</a>
                    <?php }?>
                    <?php if (isset($_SESSION['userPassword'])) { ?>
                    <a class="btn btn-primary m-1" href="dashboard.php?page=courses" role="button"><i class="fa fa-plus"></i> Register for a course</a>
                    <?php }?>
                </div>
</div>

