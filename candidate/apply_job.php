<?php
    session_start();    
    require_once("connect.php");
    $job_id = $_POST['job_id'];
    $candidate_id = $_SESSION['candidate_id'];
    $sql_candidate_info = "SELECT * FROM candidate WHERE candidate_id = '$candidate_id'";
    $res_can = mysqli_query($conn, $sql_candidate_info);
    $row = mysqli_fetch_array($res_can);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $skills = $row['skills'];
    $experience = $row['experience'];
    $location = $row['location'];
    
    $sql = "INSERT INTO candidate (name, email, phone, skills, experience, location, password)
            VALUES('$name', '$email', '$phone', '$skills', '$experience', '$location', '$password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: candidate_profile_display.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
?>