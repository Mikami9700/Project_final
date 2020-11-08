<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      include_once("../connection.php"); 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=teachers.csv');  

      $output = fopen("php://output", "w");  
      fputcsv($output, array('teacher_id','teacher_name','subject_id','subject_name','subject_code'));  
      $query = "SELECT teacher_id,teacher_name,subject_id,subject_name,subject_code 
                FROM teachers";  
      $result = mysqli_query($mysqli, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  