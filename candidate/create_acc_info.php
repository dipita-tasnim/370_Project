<?php
require_once("connect.php");


if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $sql = "INSERT INTO users (username, email, password) 
        VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: index.php");  
        // location: candidateORemployer.php
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
}


?>