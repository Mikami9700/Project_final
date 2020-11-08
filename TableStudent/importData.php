<?php
// Load the database configuration file
include_once("../connection.php");

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $student_id  = $line[0];
                $student_name = $line[1];
                $subject_id  = $line[2];
                $subject_name = $line[3];
                $subject_code = $line[4];
                $major = $line[5];
                $department = $line[6];
                $student_level = $line[7];
 
                    // Insert member data in the database
                    $mysqli->query("INSERT INTO students (student_id,student_name,subject_id,subject_name, subject_code,major,department,student_level) 
                    VALUES ('".$student_id."', '".$student_name."', '".$subject_id."','".$subject_name."', '".$subject_code."','".$major."','".$department."','".$student_level."')");
           //     }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);