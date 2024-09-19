<?php
    session_start();
    require_once("connect.php");
    

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) 
        && isset($_POST['skill']) && isset($_POST['experience']) 
            && isset($_POST['location'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $skill = $_POST['skill'];
                $experience = $_POST['experience'];
                $location = $_POST['location'];
                $sql = "INSERT INTO candidate VALUES('$candidate_id','$name', '$email', '$phone', '$skill', '$experience', '$location')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $_SESSION['name'] = $name;
                    header("Location: candidate_profile_display.php");
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

?>