
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0e0e45;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 120px auto;
            padding: 50px;
            background-color: rgb(243, 231, 253);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .company-info {
            list-style: none;
            padding: 0;
        }

        .company-info li {
            margin: 10px 0;
            padding: 10px;
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .company-info li span {
            font-weight: bold;
            color: #555;
        }



        .job-post-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            position: absolute;
            right: 20px; 
            bottom: -50px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .job-post-button:hover {
            background-color: #218838;
        }    
    </style>
</head>
<body>
<header>JOBSITE</header>    
<div class="container">
        <h1>Company Information</h1>
        <ul class="company-info">
        <?php
        
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM company WHERE name = '$name'";
            $result = mysqli_query($conn, $sql);

            if($row = mysqli_fetch_array($result)){
                echo "<li><span>Name: </span>" . $row["name"] . "</li>";
                echo "<li><span>Industry: </span>" . $row["industry"] . "</li>";
                echo "<li><span>Location: </span>" . $row["location"] . "</li>";
            } else {
                echo "<li>Company not found.</li>";
            }
        ?>
        </ul>
        <a href="job_create.php" class="job-post-button">Post a Job</a>
    </div>
</body>
</html>