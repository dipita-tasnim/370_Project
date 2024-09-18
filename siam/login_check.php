<?php
    require_once("connect.php");


    if("isset[$username]" && "isset[$password]"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
    }
    else{
        echo ("Please enter username and password");
    }

    if($result->num_rows > 0){
        header("Location: candidateORemployer.php");
    }else{
        echo ("Wrong username or password");
    }
    
?>