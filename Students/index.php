<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>Students Login</title>
  <!-- Custom fonts -->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles  -->
<link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap 4 rtl -->
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">          
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
  
</head>
<body class="bg-dark">
<?php
//	Load DataBase From coonect.php
include("../connection.php");

//	If the user press submit this will actived 
if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['user_id']);

	// validtion Error must put value 
	if($user == "") {
		// Print Eroor message 
		$message = "Please Enter Your Username";
		echo "<script type='text/javascript'>alert('$message');</script>";
  }
  // If The value Not empty this will actived
	 else {
    mysqli_query($mysqli, "SET NAMES 'utf8'");
    mysqli_query($mysqli, 'SET CHARACTER SET utf');
		$result = mysqli_query($mysqli, "SELECT * FROM students WHERE student_id='$user'")
					or die("Could not execute the select query.");

		$row = mysqli_fetch_assoc($result);
	
		if(is_array($row) && !empty($row)) {
			$validuser = $row['student_id'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['student_name'];
      $_SESSION['user'] = $row['student_id'];
    // If the username Not true
		} else {
			$message = "Username incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
    // Go to students_table it's True
		if(isset($_SESSION['valid'])) {
			header('Location: students_table.php');			
		}
	}
}
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5 bg-light">
      <div class="card-header"><a href="../" class="logo"><img src="../images/logo-01.png" class="img-fluid" alt="Responsive image"></a></div>
      <br>
      <div class="card-body">
        <form name="form1" method="post" action="">
          <div class="form-group">
          <div class="form-label-group">
          <input type="text" id="username" name="user_id" class="form-control" placeholder="رقم المتدرب" required="required" autofocus="autofocus">
          <label for="username">رقم المتدرب</label>
          </div>
          </div>
          <div class="form-group">
          </div>
          <input class="btn btn-dark btn-block" type="submit" name="submit" value="تسجيل دخول">
        </form>
      </div>
    </div>
  </div>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

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
</body>
</html>
