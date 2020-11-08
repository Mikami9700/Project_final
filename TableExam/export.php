<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      include_once("../connection.php"); 
      header('Content-Type: text/csv; charset=utf8_general_ci');  
      header('Content-Disposition: attachment; filename=exams.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('subject_id','subject_name','subject_code','subject_exam_date','day','session','exam_room'));  
      mysqli_query($mysqli, "SET NAMES 'utf8_general_ci'");
      mysqli_query($mysqli, 'SET CHARACTER SET utf8_general_ci');
      $query = "SELECT subject_id, subject_name, subject_code, subject_exam_date,day,session,exam_room FROM subjects";  
      $result = mysqli_query($mysqli, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  