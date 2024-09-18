<?php
    require_once("connect.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    if("isset[$username]" && "isset[$password]"){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        header("Location: candidateORemployer.php");
    }else{
        die("Wrong username or password");
    }
    }
?>