<?php
    session_start();
    require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>jobsite</title>
</head>
<body>
    <div class="container my-5">
    <?php
            $candidate_id = $_SESSION['candidate_id'];
            $sql = "SELECT * FROM candidate WHERE candidate_id = '$candidate_id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
        ?>
        <h1>Welcome <?php echo $row["name"]; ?></h1>
        <button class ="btn btn-primary" onclick="location.href='candidate_profile_edit.php'">Edit Profile</button>
        <br>
        <br>
        <h5>Profile Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>candidate_id</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Skills</th>
                    <th>Experience</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
        
            <tr>
                <td><?php echo $row["candidate_id"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["skills"]; ?></td>
                <td><?php echo $row["experience"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
            </tr>
        <?php
            }
            ?>
            </tbody>
        </table>
        <h1>Jobs That You Applied</h1>
        <div class="container my-5">
            <?php
                $sql = "SELECT * FROM job WHERE job_id in (SELECT job_id FROM job_application WHERE candidate_id = '$candidate_id')";
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
                                <td>CANCEL JOB</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
    </div>
        <button class ="btn btn-primary" onclick="location.href='../rating/homepage.php'">Return To Homepage</button>
    </div>    
</body>
</html>