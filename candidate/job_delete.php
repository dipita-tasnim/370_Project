<?php
    session_start();
    require_once("connect.php");
    $job_id = $_POST['job_id'];
    $candidate_id = $_SESSION['candidate_id'];

    $sql = "DELETE FROM job_application WHERE job_id = '$job_id' 
                AND candidate_id = '$candidate_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: candidate_profile_display.php");
    }