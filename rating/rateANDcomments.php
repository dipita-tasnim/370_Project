<?php
    session_start();
    require_once("connect.php");
    $job_id = $_POST['job_id'];
    $candidate_id = $_SESSION['candidate_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $sql = "UPDATE job_application SET rating = '$rating', comments = '$comments' 
                WHERE candidate_id = '$candidate_id' AND job_id = '$job_id'";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header("Location: homepage.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }

    ?>