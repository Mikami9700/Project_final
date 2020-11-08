<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}
//including the database connection file
include("../connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Add Exam</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script src="//jquery.min.js"></script>
</head>
<body>
<?php
//including the database connection file
include_once("../connection.php");
/**
 * header('Location: students_table.php');	
 */
$checked = 0;
$checked2 = 0;
$checked3 = 0;
$chan ='';
$date='';
$month='';
$year='';

if(isset($_POST['Submit']) || isset($_POST['Submit2'])) {	
	$subject_id = $_POST['subject_id'];
	$subject_name = $_POST['subject_name'];
	$subject_code = $_POST['subject_code'];
	$subject_exam_date = $_POST['subject_exam_date'];
  $day = $_POST['day'];
	$session = $_POST['session'];
  $exam_room = $_POST['exam_room'];
  

  if(!empty($subject_id) || !empty($subject_name) || !empty($subject_code) ||
  !empty($subject_exam_date) || !empty($day) ||
  !empty($exam_room) || !empty($session)) { 



		//insert data to database	
    $result = mysqli_query($mysqli, "INSERT INTO subjects
		(subject_id,subject_name,subject_code,subject_exam_date,day,session,exam_room)
		VALUES( '$subject_id', '$subject_name', 
            '$subject_code', '$subject_exam_date', 
            '$day', '$session', '$exam_room' )");

      $message = "One Record has been ADD";
      echo "<script type='text/javascript'>alert('$message');</script>";

		if(isset($_POST['Submit2'])) {
      header('Location: index.php'); 
    
    }
  } else {
    $message = "One or more input is empty!";
      echo "<script type='text/javascript'>alert('$message');</script>";
  }
 
}
	
?>

<?php
include('../navbar_admin.php');
?>
<div id="content-wrapper">
	  <!-- Breadcrumbs-->
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">
		  <a href="../home.php">Dashboard</a>
		</li>
    <li class="breadcrumb-item active">
    <a href="index.php">Exam Table</a>
    </li>
		<li class="breadcrumb-item active">
     Add Exam
    </li>
	  </ol>
 

  <div id="app">
    <section class="section">
      <div class="container mt-2">
  <div class="row">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
      <div class="login-brand">
       <div class="card-body">
       <a href="index.php">
<button type="button" class="btn btn-outline-primary">
  <h4>View Exams</h4>
</button>
</a>
      </div>
    <div class="card ">
  <div class="card-header ">
    <h4>اضافة اختبار في جدول</h4>
  </div>
  <div class="card-body">

    <form action="add.php" method="post" name="form1">

    <div class="form-group">
    <label for="inputText">الرقم المرجعي</label>
    <input type="text" class="form-control" name="subject_id" placeholder="رقم المقرر">
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity">اسم المقرر</label>
    <input class="form-control" type="text" name="subject_name" placeholder="اسم المقرر">
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">رمز المقرر</label>
    <input class="form-control" type="text" name="subject_code" placeholder="رمز المقرر">
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-6">
    <label>تاريخ</label>
    <input class="form-control" type="text" name="subject_exam_date">
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">القاعه</label>
    <input class="form-control" type="text" name="exam_room" placeholder="0-0-0">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity">اليوم</label>
    <input class="form-control" type="text" name="day" placeholder="الاحد">
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">الفترة</label>
    <input class="form-control" type="text" name="session" placeholder="1">
    </div>

    <div class="form-group mb-0">
    <div class="form-check">
    </div>
    </div>
    </div>
    <div class="card-footer">
    <div class="form-row">
    <div class="form-group col-md-6">
      <input class='btn btn-success btn-lg btn-block' type="submit" value="Add & Stay" name="Submit">
    </div>
    <div class="form-group col-md-6">
      <input class='btn btn-info btn-lg btn-block' type="submit" value="Add & Go" name="Submit2">
    </div>
    </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>
</body>
</html>

