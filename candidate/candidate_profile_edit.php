<?php
    session_start();
    require_once("connect.php");
    $candidate_id = $_SESSION['candidate_id'];
    $sql = "SELECT * FROM candidate WHERE candidate_id = '$candidate_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $skills = $row['skills'];
        $experience = $row['experience'];
        $location = $row['location'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobsite</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center"><h1>Update Account Information</h1></div>
        <form action="edit.php" method="post">
            <div class="row mb-3">
            <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="row mb-3">
            <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="row mb-3">
            <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="row mb-3">
            <input type="text" name="skills" value="<?php echo $skills; ?>">
            </div>
            <div class="row mb-3">
            <input type="text" name="experience" value="<?php echo $experience; ?>">
            </div>
            <div class="row mb-3">
            <input type="text" name="location" value="<?php echo $location; ?>">
            </div>
            <div class="row mb-3">
            <input type="submit" value="Confirm New Information">
            </div>
        </form>
    </div>
</body>
</html>



