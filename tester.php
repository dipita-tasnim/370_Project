<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        .job-listing {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
        }
        .job-title {
            font-size: 1.5em;
            color: #007BFF;
        }
        .job-description {
            margin: 10px 0;
        }
        .job-details {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>Job Listings</h1>

    <div class="job-listings">
        <?php
        $db_server = "localhost";
        $db_name = "jobsite";
        $db_password = "";
        $db_username = "root";

        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        $location = $_GET['location'] ?? '';
        $min_salary = (int)($_GET['salary_min'] ?? 0);
        $max_salary = (int)($_GET['salary_max'] ?? 0);

        $sql = "SELECT * FROM job WHERE 1=1";
        
        if (!empty($location)) {
            $sql .= " AND location LIKE '%$location%'";
        }
        if ($min_salary > 0) {
            $sql .= " AND salary >= $min_salary";
        }
        if ($max_salary > 0) {
            $sql .= " AND salary <= $max_salary";
        }

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="job-listing">';
            echo '<div class="job-title">' . htmlspecialchars($row['title']) . '</div>';
            echo '<div class="job-description">' . htmlspecialchars($row['description']) . '</div>';
            echo '<div class="job-details">Location: ' . htmlspecialchars($row['location']) . '<br>';
            echo 'Skills: ' . htmlspecialchars($row['required_skill']) . '<br>';
            echo 'Experience: ' . htmlspecialchars($row['required_experience']) . '<br>';
            echo 'Salary: ' . htmlspecialchars($row['salary']) . '</div>';
            echo '</div>';
        }

        mysqli_close($conn);
        ?>
    </div>

</body>
</html>
