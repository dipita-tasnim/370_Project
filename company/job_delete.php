<?php
    session_start();
    require_once('connect.php');

    // Ensure company is logged in
    if (!isset($_SESSION['company_id'])) {
        echo "Please log in as a company to delete job postings.";
        exit;
    }

    // Get job_id from URL
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];
        $company_id = $_SESSION['company_id'];

        // Check if the job belongs to the logged-in company
        $sql = "SELECT * FROM job WHERE job_id = '$job_id' AND company_id = '$company_id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Delete the job if it exists and belongs to the company
            $delete_sql = "DELETE FROM job WHERE job_id = '$job_id' AND company_id = '$company_id'";
            if (mysqli_query($conn, $delete_sql)) {
                $_SESSION['success_message'] = "Job deleted successfully!";
                header("Location: homepage.php");
                exit();
            } else {
                echo "Error deleting job: " . mysqli_error($conn);
            }
        } else {
            echo "Job not found or you do not have permission to delete this job.";
            exit();
        }
    } else {
        echo "Invalid job ID.";
    }
?>
