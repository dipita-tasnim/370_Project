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
            width: 100%;
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
        <form action="company.php" method="POST">
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label> <!-- Added -->
                <input type="email" id="email" name="email" required> <!-- Added -->
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
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>




<?php
// Database connection details
$servername = "localhost"; // or 127.0.0.1 if running locally
$username = "root";        // adjust if using a different MySQL user
$password = "";            // set the password if there is one
$dbname = "jobsite";       // the name of the database in your dump

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null; // Added
    $industry = isset($_POST['industry']) ? trim($_POST['industry']) : null;
    $location = isset($_POST['location']) ? trim($_POST['location']) : null;

    // Validate form data
    if (empty($name) || empty($email) || empty($industry) || empty($location)) { // Updated
        echo "All fields are required.";
        exit();
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO company (name, email, industry, location) VALUES (?, ?, ?, ?)"; // Updated
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("ssss", $name, $email, $industry, $location); // Updated

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Company profile created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
