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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Skills</th>
                    <th>Experience</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
        
            <tr>
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
    </div>    
</body>
</html>