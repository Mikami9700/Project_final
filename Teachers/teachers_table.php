<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}
?>
<?php
//including the database connection file
include_once("../connection.php");
$tech = $_SESSION['user'];

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli,
        "SELECT DISTINCT teachers.subject_id,subjects.subject_name, subjects.subject_name,
        subjects.subject_code, subjects.exam_room, subjects.subject_exam_date,
        subjects.day, subjects.session
        FROM teachers , subjects
        WHERE teachers.subject_id = subjects.subject_id
        AND teachers.teacher_id = '$tech'");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="stylesheet" href="../style.css">
  <title>Teacher Table</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">          
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
  
</head>
<body>
<!-- navbar -->
<?php
require('../nav_users.php');
?> 
  <div id="wrapper">

<!-- Sidebar -->


<div id="content-wrapper">

  <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="teachers_table.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
          
        
        <!-- Page Content -->

<!----->
<!----->

<div class="d-none d-print-block">
<br><br><br>
<h3 class="text-center">
جدول الاختبارات  النهائيه للفصل الاول لعام 1441هـ 
</h3>
<br>
<hr>
<div class="float-right"><?php echo $_SESSION['name']; ?> : اسم المتدريب</div>
<div class="float-left"><?php echo $stdd ?> : رقم المتدريب</div>
<br>
</div>
</div>
 
<div class="card mb-3">
<div class="card-header">
<button type="button" class="btn btn-dark d-print-none"  onclick="myFunction()">Print this page</button>
 
 </div>
  <div class="card-body">
  <div class="table-responsive">
  <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0"> 
  <thead>
  <tr>          
  <th>الوقت</th>          
  <th>الفترة</th>          
  <th>اليوم</th>          
  <th>التاريخ</th>          
  <th>القاعة</th>          
  <th>رمز المقرر</th>
  <th>اسم المقرر</th>
  <th>الرقم المرجعي</th>
  </tr>
  </tbody>
		<?php
		while($res = mysqli_fetch_array($result)) {	
      switch ($res['session']) {
        case 1:
            $exam_time = '8:00-10:00';
            break;
        case 2:
            $exam_time = '10:00-12:00';
            break;
        case 3:
            $exam_time = '12:30-2:30';
            break;
          }
		echo "<tbody>";
		echo "<tr>";    
    echo "<td>".$exam_time."</td>";
    echo "<td>".$res['session']."</td>";
    echo "<td>".$res['day']."</td>";
    echo "<td>".$res['subject_exam_date']."</td>";
    echo "<td>".$res['exam_room']."</td>";
    echo "<td>".$res['subject_code']."</td>";
		echo "<td>".$res['subject_name']."</td>";
    echo "<td>".$res['subject_id']."</td>";
    echo "<tr>";
		}
		?>
    </tbody>
		</table>	
</div>
</div>
</div>
<div class="d-none d-print-block">
<h3>
<div class='mik'> 
<div class="float-right">
 الختم
</div></div>
</h3>
</div>
</div>


    <!-- /.content-wrapper -->
</div>
<?php
require('../footer.php');
?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


 
  <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
 <script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>
