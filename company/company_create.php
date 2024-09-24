<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company Profile</title>
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
            background-color: rgba(174, 177, 176);
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

        .form-group input,
        .form-group select {
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
        <h2>Create Company Profile</h2>

        <form action="company_create.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" id="name" name="company" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="industry">Industry</label>
                <select id="industry" name="industry" required>
                    <option value="">Select Industry</option>
                    <option value="IT">IT</option>
                    <option value="finance">Finance</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="education">Education</option>
                    <option value="manufacturing">Manufacturing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>



<?php require_once("connect.php");
session_start();
if (
    isset($_POST['name']) && isset($_POST['company']) && isset($_POST['email'])
    && isset($_POST['industry']) && isset($_POST['location'])
    && isset($_POST['password'])
) {
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $industry = $_POST['industry'];
    $location = $_POST['location'];
    $password = $_POST['password'];

    // Check email already exists
    $sql = "SELECT * FROM company WHERE email = '$email' or name = '$name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // Display error message. Should not craete acc with same name or email
        echo "<script type='text/javascript'>alert('Name or Email already exists')</script>"; 
        exit();
    }

    $sql = "INSERT INTO company (name, company, email, industry, location, password)
                        VALUES('$name', '$company', '$email', '$industry', '$location', '$password')";
    $result = mysqli_query($conn, $sql);

    $company_id = mysqli_insert_id($conn); // This function fetch the auto-incement ID of the inserted row.
    
    $_SESSION['company_id'] = $company_id;
    // $_SESSION['logged_in_type'] = 'employer';

    header("Location: company_profile.php");
}
?>