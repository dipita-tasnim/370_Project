<?php
    $db_server = "localhost";
    $db_name = "job_site";
    $db_password = "";
    $db_username = "root";

    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    
    if($conn) {
        header("Location: homepage.html");
    } else {
        echo "Connection Failed";
    }
?>