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

$id = $_GET['id'];

$checked = 0;
$checked2 = 0;
$checked3 = 0;
$chan ='';
$date='';
$month='';
$year='';

$subject_id2 ='';
$subject_name2 ='';
$subject_code2 ='';
$subject_exam_date2 ='';
$day2 ='';
$session2 ='';
$exam_room2 ='';


$result2 = mysqli_query($mysqli, "SELECT * FROM subjects WHERE subject_id='$id'");
while($res = mysqli_fetch_array($result2)) {

  $subject_id2 = $res['subject_id'];
  $subject_name2 = $res['subject_name'];
  $subject_code2 = $res['subject_code'];
  $subject_exam_date2 = $res['subject_exam_date'];
  $day2 = $res['day'];
  $session2 = $res['session'];
  $exam_room2 = $res['exam_room'];

}

if(isset($_POST['update'])) {
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


		//  insert data to database	
    $result = mysqli_query($mysqli, "UPDATE subjects
              SET subject_name='$subject_name', subject_code='$subject_code',
              subject_exam_date='$subject_exam_date', day='$day', session='$session', exam_room='$exam_room'
              WHERE subject_id='$subject_id'");
      header('Location: index.php'); 
     /*  $message = "Values".$subject_id." ".$subject_name." ".$subject_code;
      echo "<script type='text/javascript'>alert('$message');</script>"; */
 
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
<button type="button" class="btn btn-dark">
  <h4>View Exams</h4>
</button>
</a>
      </div>
    <div class="card ">
  <div class="card-header ">
    <h4>تعديل اختبار في جدول</h4>
  </div>
  <div class="card-body">
  <div class="alert alert-info" role="alert">
      لا يمكن تعديل رقم المقرر
  </div>
    <form action="edit.php" method="post" name="form2">

    <div class="form-group">
    <label for="inputText">رقم المرجعي</label>
    <input type="text" class="form-control" name="subject_id" placeholder="رقم المقرر" value="<?php echo $subject_id2; ?>" >
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity">اسم المقرر</label>
    <input class="form-control" type="text" name="subject_name" placeholder="اسم المقرر" value="<?php echo $subject_name2; ?>" >
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">رمز المقرر</label>
    <input class="form-control" type="text" name="subject_code" placeholder="رمز المقرر" value="<?php echo $subject_code2; ?>" > 
    </div>
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-6">
    <label>تاريخ</label>
    <input class="form-control" type="text" name="subject_exam_date" value="<?php echo $subject_exam_date2; ?>" >
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">القاعه</label>
    <input class="form-control" type="text" name="exam_room" placeholder="0-0-0" value="<?php echo $exam_room2; ?>">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity">اليوم</label>
    <input class="form-control" type="text" name="day" placeholder="الاحد" value="<?php echo $day2; ?>">
    </div>

    <div class="form-group col-md-6">
    <label for="inputCity">الفترة</label>
    <input class="form-control" type="text" name="session" placeholder="0" value="<?php echo $session2; ?>">
    </div>
    </div>

    <div class="form-group mb-0">
    <div class="form-check">
    </div>
    </div>
    </div>
    <div class="card-footer">
    <div class="form-group  ">
      <input class='btn btn-success btn-lg btn-block' type="submit" value="update" name="update">
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

