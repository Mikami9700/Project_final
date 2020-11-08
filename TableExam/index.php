<?php session_start(); 
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('../Location: login.php');
}
?>
<?php
//including the database connection file
include_once("../connection.php");
  /* This is select mysql */
//fetching data in descending order (lastest entry first)
mysqli_query($mysqli, "SET NAMES 'utf8'");
mysqli_query($mysqli, 'SET CHARACTER SET utf');
$result = mysqli_query($mysqli, "SELECT * FROM subjects");
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Tables</title>

  
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">          
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
  
</head>
<body>
<?php
include('../navbar_admin.php');

$exam_time = '';

// Get status message
if(!empty($_GET['status'])){
     switch($_GET['status']){
         case 'succ':
             $statusType = 'alert-success';
             $statusMsg = 'Members data has been imported successfully.';
             break;
         case 'err':
             $statusType = 'alert-danger';
             $statusMsg = 'Some problem occurred, please try again.';
             break;
         case 'invalid_file':
             $statusType = 'alert-danger';
             $statusMsg = 'Please upload a valid CSV file.';
             break;
         default:
             $statusType = '';
             $statusMsg = '';
     }
 }
?>
<div id="content-wrapper">

  <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="../home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Exam Table</li>
        </ol>

<!-- Display status message  -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

<div class="col-md-12" id="importFrm" style="display: none;">
 
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            <div class="alert alert-primary" role="alert">
             The excel file must be "CSV UTF-8"
            </div>
        </form>
    </div>

  <div class="card mb-3">
  <div class="card-header">
  
<form method="post" action="export.php">  
<a href="add.php">
<button type="button" class="btn btn-dark">Add Exam</button>
</a>
<a href="javascript:void(0);" class="btn btn-info" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
<input type="submit" name="export" value="CSV Export" class="btn btn-success"/> 
<?php echo "<a href=\"delete_table.php\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger float-right \">Delete Table Teachers</a>";?>
</form>
  </div>
  <div class="card-body">
  <div class="table-responsive">
  <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0"> 
          <thead>  
               <tr>  
                    <td>حذف</td>  
                    <td>تعديل</td>   
                    <td>الوقت</td>   
                    <td>الفتره</td>   
                    <td>اليوم</td>  
                    <td>التاريخ</td>  
                    <td>القاعة</td>  
                    <td>رمز المقرر</td>  
                    <td>اسم المقرر</td>  
                    <td>رقم الشعبه</td>  
               </tr>  
          </thead>  
          <?php  
           
          while($row = mysqli_fetch_array($result))  
          {  
            switch ($row['session']) {
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
               echo '  
               <tr>';?><?php
               echo "<td><a href=\"delete.php?id=$row[subject_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash' style='color:black'></i></a></td>";
              
               echo "<td><a href=\"edit.php?id=$row[subject_id]\"><i class='fas fa-edit' style='color:black'></i></a></td>";
                ?>	
                 <?php echo '
                    <td>'.$exam_time.'</td>  
                    <td>'.$row["session"].'</td>  
                    <td>'.$row["day"].'</td>  
                    <td>'.$row["subject_exam_date"].'</td>  
                    <td>'.$row["exam_room"].'</td>  
                    <td>'.$row["subject_code"].'</td>    
                    <td>'.$row["subject_name"].'</td>  
                    <td>'.$row["subject_id"].'</td>  
               </tr>  
               ';  
          }  
          ?>  
     </table>  
        </div>  
   </div>  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <!-- logout -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <!-- Bootstrap core JavaScript-->
   <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>   
 <!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>                  
</body>

</html>
