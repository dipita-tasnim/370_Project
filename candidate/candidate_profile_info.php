<?php
    session_start();
    require_once("connect.php");
    

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) 
        && isset($_POST['skills']) && isset($_POST['experience']) 
            && isset($_POST['location'])){
                $user_id = $_SESSION['user_id']; 
                // retrieve
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $skills = $_POST['skills'];
                $experience = $_POST['experience'];
                $location = $_POST['location'];
                $sql = "INSERT INTO candidate (user_id, name, email, phone, skills, experience, location)
                    VALUES(user_id, '$name', '$email', '$phone', '$skills', '$experience', '$location')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $_SESSION['user_id'] = $user_id;
                    header("Location: candidate_profile_display.php");
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

?>