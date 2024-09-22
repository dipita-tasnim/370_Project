<?php
    session_start();
    require_once("connect.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $location = $_POST['location'];
    $candidate_id = $_SESSION['candidate_id'];
    $sql = "UPDATE candidate SET name = '$name', email = '$email', phone = '$phone', 
        skills = '$skills', experience = '$experience', location = '$location' 
            WHERE candidate_id = '$candidate_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: candidate_profile_display.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }    
?>