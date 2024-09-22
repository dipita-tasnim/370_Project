<?php
    session_start();
    require_once('connect.php');

    // Ensure company is logged in
    if (!isset($_SESSION['company_id'])) {
        echo "Please log in as a company to update job postings.";
        exit;
    }

    // Get job_id from URL or form submission
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        // Fetch current job data to pre-fill the form
        $company_id = $_SESSION['company_id'];
        $sql = "SELECT * FROM job WHERE job_id = '$job_id' AND company_id = '$company_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $job = mysqli_fetch_assoc($result);
        } else {
            echo "Job not found or you do not have permission to edit this job.";
            exit;
        }
    }

    // Process form submission
    if (isset($_POST['update_job'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $required_skill = mysqli_real_escape_string($conn, $_POST['required_skill']);
        $required_experience = mysqli_real_escape_string($conn, $_POST['required_experience']);

        // Update job information
        $sql = "UPDATE job SET 
                title = '$title', 
                location = '$location', 
                salary = '$salary', 
                required_skill = '$required_skill', 
                required_experience = '$required_experience'
                WHERE job_id = '$job_id' AND company_id = '$company_id'";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Job updated successfully!";
            header("Location: homepage.php");
            exit();
        } else {
            echo "Error updating job: " . mysqli_error($conn);
        }
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
    <form action="update_job.php?job_id=<?php echo $job_id; ?>" method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $job['title']; ?>" required><br><br>
        <label>Location:</label>
        <input type="text" name="location" value="<?php echo $job['location']; ?>" required><br><br>
        <label>Salary:</label>
        <input type="text" name="salary" value="<?php echo $job['salary']; ?>" required><br><br>
        <label>Required Skill:</label>
        <input type="text" name="required_skill" value="<?php echo $job['required_skill']; ?>" required><br><br>
        <label>Required Experience:</label>
        <input type="text" name="required_experience" value="<?php echo $job['required_experience']; ?>" required><br><br>
        <button type="submit" name="update_job">Update Job</button>
    </form>
</body>
</html>
