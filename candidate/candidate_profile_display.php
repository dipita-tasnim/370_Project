<?php
    session_start();
    require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobsite</title>
</head>
<body>
    <?php
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM candidate WHERE name = '$name'";
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_array($result)){
            echo $row["name"];
            echo $row["email"];
            echo $row["phone"];
            echo $row["skills"];
            echo $row["experience"];
            echo $row["location"];
        }

    ?>
</body>
</html>