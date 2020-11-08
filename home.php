<?php session_start(); ?>
<!DOCTYPE html>
<html>
 
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ADMIN HOME PAGE</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
 
	?>


 <!-- Navbar -->
 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
  </button>
  <a class="navbar-brand mr-1" href="home.php">TVTC EXAM</a>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown  ">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-user-circle fa-fw"></i><span> <?php echo $_SESSION['name'] ?> </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
  </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="TableExam">
        <i class='fas fa-file-alt'></i>
          <span>Exam</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="TableStudent">
        <i class='fas fa-users'></i>
          <span>Students</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="TableTeacher">
        <i class='fas fa-chalkboard-teacher'></i>
          <span>Teachers</span></a>
      </li>
    </ul>
<div id="content-wrapper">

  <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="home.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Page Content -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">         
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class='fas fa-file-alt'></i>
                </div>
                <div class="mr-5">Exams </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="TableExam">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class='fas fa-users'></i>
                </div>
                <div class="mr-5">Students</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="TableStudent">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class='fas fa-chalkboard-teacher'></i>
                </div>
                <div class="mr-5">Teachers</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="TableTeacher">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class='fas fa-book'></i>
                </div>
                <div class="mr-5">Subject</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class='fas fa-building'></i>
                </div>
                <div class="mr-5">Building</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <h1>
        <?php
       // echo $_SESSION['id']; 
        ?>
        </h1>

              
      <!-- /.container-fluid -->
 
    <!-- /.content-wrapper -->


  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <!-- Make the page goes up-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php	
	} else {
		header('Location: index.php');
	}
	?>

  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
