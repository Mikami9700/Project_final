<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>Teachers Login</title>
  <!-- Custom fonts -->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles  -->
<link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap 4 rtl -->
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
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
		
		$message = "Please Enter Your Username";
		echo "<script type='text/javascript'>alert('$message');</script>";
  }
  // If The value Not empty this will actived
	 else {
		$result = mysqli_query($mysqli, "SELECT * FROM teachers WHERE teacher_id='$user'")
					or die("Could not execute the select query.");
		
    $row = mysqli_fetch_assoc($result);
    
		if(is_array($row) && !empty($row)) {
			$validuser = $row['teacher_id'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['teacher_name'];
      $_SESSION['user'] = $row['teacher_id'];
    // If the username Not true
		} else {
			$message = "Username incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
    // Go to students_table it's True
		if(isset($_SESSION['valid'])) {
			header('Location: teachers_table.php');			
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
          <label for="username">رقم المعلم</label>
          </div>
          </div>
          <div class="form-group">
          </div>
          <input class="btn btn-dark btn-block" type="submit" name="submit" value="تسجيل دخول">
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


</body>
</html>
