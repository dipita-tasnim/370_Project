<?php
    session_start();
    require_once("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Site 101</title>
</head>
<body>
    <div class="container my-5">
        <h1>Welcome to Job Site </h1>
        <h2>All The Available Jobs</h2>
            <?php
                $sql = "SELECT * FROM job";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Job Description</th>
                                <th>Job Location</th>
                                <th>Required Skill</th>
                                <th>Required Experience</th>
                                <th>Salary</th>
                                <th>Posted Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["location"]; ?></td>
                                <td><?php echo $row["required_skill"]; ?></td>
                                <td><?php echo $row["required_experience"]; ?></td>
                                <td><?php echo $row["salary"]; ?></td>
                                <td><?php echo $row["posted_date"]; ?></td>
                                <td><form action="apply_job.php" method="post">
                                    <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                                    <input type="submit" value="Apply" >
                                </form></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
    </div>

</body>
</html>
