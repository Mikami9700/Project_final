<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../login.php');
}
?>

<?php
//including the database connection file
include("../connection.php");

$id = $_GET['id'];
//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM students");

//redirecting to the display page (view.php in our case)
header("Location:index.php");
?>

