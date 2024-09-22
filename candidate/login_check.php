<?php
    // session_start();
    require_once("connect.php");

    if(isset($_POST['username']) && isset($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            // $_SESSION['username'] = $username;
            // $_SESSION['password'] = $password;
            // $_SESSION['user_id'] = $user_id;
            // $_SESSION['email'] = $email;

            header("Location: candidateORemployer.php");
        }else{
            echo 'Wrong username or password';
        }
    }
?>