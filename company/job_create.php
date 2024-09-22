<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0e0e45;
            padding: 50px;
            margin: 0;
        }
        header {
            position: absolute;
            top: 10px;
            left: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .form-container {
            background-color: rgba(174, 177, 176 );
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: 100px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 95%; 
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: rgba(0, 0, 0, 1);
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <header>JOBSITE</header>
    <div class="form-container">
        <h2>Create a New Job</h2>
        <form action="job_create.php" method="POST">
        
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="required_skill">Required Skill</label>
                <input type="text" id="required_skill" name="required_skill" required>
            </div>
            <div class="form-group">
                <label for="required_experience">Required Experience</label>
                <input type="text" id="required_experience" name="required_experience" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>



<?php
    session_start();
    require_once("connect.php");
?>

<?php

if(isset($_POST['title'])  && isset($_POST['location']) 
        && isset($_POST['salary']) && isset($_POST['required_skill'])  && isset($_POST['required_experience']) ){
            
        $title = $_POST['title'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $required_skill = $_POST['required_skill'];
        $required_experience = $_POST['required_experience'];
        
        
        if (isset($_SESSION['company_id'])) {
            $company_id = $_SESSION['company_id'];

            $sql = "INSERT INTO job (title, location, salary, required_skill, required_experience) 
                    VALUES ('$title', '$location', '$salary', '$required_skill', '$required_experience')";

                
            $result = mysqli_query($conn, $sql);
                
            if($result){
                $_SESSION['name'] = $name;
                header("Location: candidate/homepage.php");
            }
            else {
                echo "Error: " . mysqli_error($conn);
            }
        }


}