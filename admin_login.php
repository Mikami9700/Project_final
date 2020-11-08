<?php session_start(); ?>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


	<title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
 
<?php
//	Load DataBase From coonect.php
include("connection.php");

//	If the user press submit this will actived 
if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	// validtion Error must put value 
	if($user == "" || $pass == "") {
		
		$message = "Please Enter Your Username and Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	 else {
    mysqli_query($mysqli, "SET NAMES 'utf8'");
    mysqli_query($mysqli, 'SET CHARACTER SET utf');
		$result = mysqli_query($mysqli, "SELECT * FROM admin_exam WHERE username='$user' AND password='$pass'")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		/* If the username and passowrd not true */
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: home.php');			
		}
	}
}
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <form name="form1" method="post" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <!--<div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>-->
          </div>
          <!--<a class="btn btn-primary btn-block" href="index.html">Login</a>-->
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit">
        </form>
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
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
