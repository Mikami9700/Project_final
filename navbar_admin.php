<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
  </button>
  <a class="navbar-brand mr-1" href="../home.php">TVTC EXAM</a>
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
        <a class="nav-link" href="../TableExam">
        <i class='fas fa-file-alt'></i>
          <span>Exam</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../TableStudent">
        <i class='fas fa-users'></i>
          <span>Students</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../TableTeacher">
        <i class='fas fa-chalkboard-teacher'></i>
          <span>Teachers</span></a>
      </li>
    </ul>

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
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
