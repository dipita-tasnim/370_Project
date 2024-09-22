<?php
    session_start();
    require_once("connect.php");

    if(isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        if($_POST['candidate']){
            $sql = "SELECT * FROM candidate WHERE name = '$name' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                header("Location: homepage.php");
            }
            else{
                echo "Wrong username or password";
            }
        }
        else{
            if($_POST['employer']){
                $res = mysqli_query($conn, "SELECT company_id FROM company WHERE name = '$name' AND password = '$password'");
                $row = mysqli_fetch_assoc($res);
                $_SESSION['company_id'] = $row['company_id'];
                if(mysqli_num_rows($res) > 0){
                    header("Location: ../company/company_profile.php");
                }
                else{
                    echo "Wrong username or password";
                    }    
            }           
        }
    }
