<?php
session_start();
require_once('connect.php');

$company_id = $_SESSION['company_id'];
$job_id = $_GET['job_id'];

$sql = "SELECT * FROM job WHERE job_id = '$job_id' AND company_id = '$company_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $job = mysqli_fetch_assoc($result);
} else {
    echo "Job not found or you do not have permission to edit this job.";
    exit();
}


// Process form submission
if (isset($_POST['oyshi'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $required_skill = $_POST['required_skill'];
    $required_experience = $_POST['required_experience'];
    $salary = $_POST['salary'];
    $posted_date = $_POST['posted_date'];

    // Update job information
    $sql = "UPDATE job SET 
                title = '$title',
                description = '$description', 
                location = '$location',  
                required_skill = '$required_skill', 
                required_experience = '$required_experience',
                salary = '$salary',
                posted_date = '$posted_date'
                WHERE job_id = '$job_id' AND company_id = '$company_id'";

    mysqli_query($conn, $sql);
    header("Location: job_list.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job</title>
</head>

<body>
    <h2>Update Job Posting</h2>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $job['title']; ?>" required><br><br>
        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $job['description']; ?>" required><br><br>
        <input type="text" name="location" value="<?php echo $job['location']; ?>" required><br><br>
        <label>Location:</label>
        <input type="text" name="salary" value="<?php echo $job['salary']; ?>" required><br><br>
        <label>Required Skill:</label>
        <input type="text" name="required_skill" value="<?php echo $job['required_skill']; ?>" required><br><br>
        <label>Required Experience:</label>
        <input type="text" name="required_experience" value="<?php echo $job['required_experience']; ?>" required><br><br>
        <label>Salary:</label>
        <input type="text" name="salary" value="<?php echo $job['salary']; ?>" required><br><br>
        <label>Posted date:</label>
        <input type="text" name="posted_date" value="<?php echo $job['posted_date']; ?>" required><br><br>
        <input type="submit" name="oyshi" value="SAVE"><br><br>
    </form>
</body>

</html>