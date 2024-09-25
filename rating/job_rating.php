<?php
    session_start();
    require_once("connect.php");
    if (isset($_POST['job_id']) && isset($_SESSION['candidate_id'])) {
        $job_id = $_POST['job_id'];
        $candidate_id = $_SESSION['candidate_id'];
        $sql = "SELECT * FROM job_application WHERE candidate_id = '$candidate_id' AND job_id = '$job_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Jobsite</title>
            </head>
            <body>
                <form action="rateANDcomments.php" method="post">
                    <input type="text" name="rating" placeholder="Rate This job out of 10" >
                    <input type="text" name="comments" placeholder="Give Your Comments" >
                    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                    <input type="submit" value="Submit">
                </form>
            </body>
            </html>
            <?php
        }
        else {
            echo "You have not applied for this job";
        }
    }

?>
