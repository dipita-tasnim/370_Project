<?php
    session_start();
    require_once("connect.php");
    $job_id = $_POST['job_id'];
    $candidate_id = $_SESSION['candidate_id'];
    
    $sql = "SELECT required_skill FROM job WHERE job_id = '$job_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $required_skill = $row['required_skill'];
    $skill_array = explode(',', $required_skill);
    $can_skill = 0;
    $req_skill = 0;
    $flag = FALSE;
    echo "Required Skills: <br>"; ;
    foreach ($skill_array as $skill) {
        if ($skill == "none") {
            $flag = TRUE;
        }
        else{
        $req_skill++;
        echo $skill . "<br>";
        $sql = "SELECT * FROM candidate WHERE skills like '%$skill%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $can_skill++;
            }
        }
    }
    if ($flag) {
        echo "No required skills you can have this job <br>";
    }
    else{
        echo "You have  " . $can_skill . " out of " . $req_skill . " required skills <br>";
        $p = ($can_skill / $req_skill) * 100;
        echo "You have a " . $p . " % of getting this job<br>";
    }
?>
