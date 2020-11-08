<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
/*       include_once("../connection.php"); 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=students.csv');   */
      include_once("../connection.php"); 
      header('Content-Type: text/csv; charset=utf8_general_ci');  
      header('Content-Disposition: attachment; filename=students.csv');   
      $output = fopen("php://output", "w");  
      fputcsv($output, array('student_id', 'student_name', 'subject_id','subject_name','subject_code','major','department','student_level'));  
      $query = "SELECT student_id,student_name,subject_id,subject_name,subject_code,major,department,student_level 
      FROM students";  
      $result = mysqli_query($mysqli, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  