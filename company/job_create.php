<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: while;
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
                <label for="Description">Description</label>
                <input type="text" id="Description" name="description" required>
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
                <label for="posted_date">posted_date</label>
                <input name="posted_date" placeholder="YYYY-MM-DD">
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

    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['location']) 
        && isset($_POST['required_skill']) && isset($_POST['required_experience'])  
            && isset($_POST['salary']) && isset($_POST['posted_date'])) {
                $company_id = $_SESSION['company_id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $location = $_POST['location'];
                $required_skill = $_POST['required_skill'];
                $required_experience = $_POST['required_experience'];
                $salary = $_POST['salary'];
                $posted_date = $_POST['posted_date'];
                $sql = "INSERT INTO job (company_id , title, description, location, required_skill, required_experience, salary, posted_date) 
                        VALUES('$company_id', '$title', '$description', '$location', '$required_skill', '$required_experience', '$salary', '$posted_date')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $_SESSION['name'] = $name;
                    header("Location: company_profile.php");
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            }


?>