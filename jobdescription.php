<?php
    session_start();
    require_once("<candidate/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jobdescription.css">
    <title>Job Description</title>
</head>
<body>
    <div class="container my-5">
    <?php
        $job_id = $_SESSION['job_id'];
        $sql = "SELECT * FROM job WHERE job_id = '$job_id'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_array($result)) {
    ?>
        <h1>Job Title: <?php echo $row["title"]; ?></h1>
        <h2>Job Information</h5>
        <div class="job_info">
        <p>Job Description: <?php echo $row["description"]; ?></p>
        <p>Job Location: <?php echo $row["location"]; ?></p>
        <p>Salary: <?php echo $row["salary"]; ?></p>
        <p>Required Skill: <?php echo $row["required_skill"]; ?></p>
        <p>Required Experience: <?php echo $row["required_experience"]; ?></p>
        <p>Posted Date: <?php echo $row["posted_date"]; ?></p>
        </div>
        
    <?php
        } else {
            echo "<h3>Job not found!</h3>";
        }
    ?>
    </div>    
</body>
</html>
