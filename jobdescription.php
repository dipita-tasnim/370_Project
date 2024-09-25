<?php
    session_start();
    require_once("rating/connection.php");
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
        $job_id = $_GET['job_id'];  // Assume job_id is passed via URL
        $sql = "SELECT * FROM job WHERE job_id = '$job_id'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_array($result)) {
    ?>
        <h1>Job Title: <?php echo $row["title"]; ?></h1>
        <h5>Job Information</h5>
        <table class="table">
            <thead>
                <tr>
                    <td>Job ID <?php echo $row["job_id"]; ?> </td>
                    <td>Description <?php echo $row["description"]; ?></td>
                    <td>Location <?php echo $row["location"]; ?></td>
                    <td>Required Skill <?php echo $row["required_skill"]; ?></td>
                    <td>Required Experience<?php echo $row["required_experience"]; ?></td>
                    <td>Salary <?php echo $row["salary"]; ?></td>
                    <td>Posted Date <?php echo $row["posted_date"]; ?></td>
                </tr>
            </thead>

        </table>
        
    <?php
        } else {
            echo "<h3>Job not found!</h3>";
        }
    ?>
    </div>    
</body>
</html>
