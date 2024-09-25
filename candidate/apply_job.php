<?php
    session_start();    
    require_once("connect.php");
    $job_id = $_POST['job_id'];
    $candidate_id = $_SESSION['candidate_id'];
    
    $sql = "INSERT INTO job_application (application_id, candidate_id, job_id)
            VALUES('$application_id', '$candidate_id', '$job_id')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: candidate_profile_display.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
?>