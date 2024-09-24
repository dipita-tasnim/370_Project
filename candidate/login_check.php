<?php
    session_start();
    require_once("connect.php");

    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        if($_POST['candidate']){
            $res = mysqli_query($conn, "SELECT candidate_id FROM candidate WHERE name = '$name' AND password = '$password'");
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['candidate_id'] = $row['candidate_id'];
                $_SESSION['logged_in_type'] = 'candidate';
                header("Location: candidate_profile_display.php");
            }
            else{
                echo "Wrong username or password";
            }
        }
        else{
            if($_POST['employer']){
                $res = mysqli_query($conn, "SELECT company_id FROM company WHERE name = '$name' AND password = '$password'");
                if(mysqli_num_rows($res) > 0){
                    $row = mysqli_fetch_assoc($res);
                    $_SESSION['company_id'] = $row['company_id'];
                    $_SESSION['logged_in_type'] = 'employer';
                    header("Location: ../company/company_profile.php");
                }
                else{
                    echo "Wrong username or password";
                    }    
            }           
        }
    }
