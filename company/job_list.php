<?php
session_start();
require_once("connect.php");

$company_id = $_SESSION['company_id'];

$sql = "SELECT * FROM job WHERE company_id = '$company_id'";
$result = mysqli_query($conn, $sql);
$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

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

        header {
            position: absolute;
            top: 10px;
            left: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 500px;
            margin: 120px auto;
            padding: 50px;
            background-color: rgb(243, 231, 253);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
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



        .update-job-button {
            padding: 1px 5px;
            /* Adjusted padding for better visibility */
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            
        }


        .update-job-button:hover {
            background-color: #218838;
        }
        
        .delete-job-button {
            padding: 1px 5px;
            /* Adjusted padding for better visibility */
            background-color: red;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }

        .delete-job-button:hover {
            background-color: #ff0000;
           
        }


        .company-info li span {
            font-weight: bold;
            color: #555;
        }
    </style>

</head>

<body>
    <header>JOBSITE</header>
    <div class="container">
        <h1> <?php echo 'All Jobs'; ?> </h1>
        <ul class="company-info">
            <?php foreach ($jobs as $job) {
                // Now $job represents a single job's information
                echo "Title: " . $job['title'] . "<br>";
                echo "Description: " . $job['description'] . "<br>";
                echo "Location: " . $job['location'] . "<br>";
                echo "Required Skills: " . $job['required_skill'] . "<br>";
                echo "Required Experience: " . $job['required_experience'] . "<br>";
                echo "Salary: " . $job['salary'] . "<br>";
                echo "Posted Date: " . $job['posted_date'] . "<br><br>";
            ?>
                <div>
                    <a href="job_update.php?job_id=<?php echo $job['job_id']; ?>" class="update-job-button">Update Job</a><br><br>
                    <a href="job_delete.php?job_id=<?php echo $job['job_id']; ?>" class="delete-job-button">Delete Job</a><br><br>
                </div>

            <?php
            }
            ?>
        </ul>
    </div>

</body>

</html>