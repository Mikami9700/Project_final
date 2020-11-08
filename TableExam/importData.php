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
                $subject_id   = $line[0];
                $subject_name  = $line[1];
                $subject_code  = $line[2];
                $subject_exam_date = $line[3];
                $day = $line[4];
                $session = $line[5];
                $exam_room = $line[6];

                    // Insert member data in the database
                    $mysqli->query("INSERT INTO subjects (subject_id, subject_name, subject_code, subject_exam_date,day,session,exam_room) 
                    VALUES ('".$subject_id."', '".$subject_name."', '".$subject_code."','".$subject_exam_date."', '".$day."','".$session."', '".$exam_room."')");
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