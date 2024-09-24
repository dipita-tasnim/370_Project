<?php

require_once("connect.php");
session_start();

$job_id = $_GET['job_id'];
$sql = "DELETE FROM job WHERE job_id = '$job_id'";
mysqli_query($conn, $sql);
header("Location: job_list.php");
?>