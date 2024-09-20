<?php
    $db_server = "localhost";
    $db_name = "jobsite";
    $db_password = "";
    $db_username = "root";

    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }
?>