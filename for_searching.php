<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .search-container {
            background-color: #B0E0E6;
            margin: 50px auto;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .search-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .search-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .search-container input[type="text"],
        .search-container input[type="number"],
        .search-container select {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
        }

        .search-container button {
            width: 100%;
            padding: 10px;
            background-color: #F4C2C2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-container button:hover {
            background-color: #00008B;
        }
    </style>
</head>

</html>
<div class="search-container">
    <h2>Search for Jobs</h2>
    <form method="get" action="for_searching.php">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location(Dhaka, Gazipur,Tangail,Faridpur)">


        <label for="salary-min">Salary Range:</label>
        <div style="display: flex; justify-content: space-between;">
            <input type="number" id="salary-min" name="salary_min" placeholder="Min Salary">
            <span style="margin: 0 10px;">-</span>
            <input type="number" id="salary-max" name="salary_max" placeholder="Max Salary">
        </div>
        <input type="submit" name="submit">
    </form>
</div>

</body>

</html>

<?php
$db_server = "localhost";
$db_name = "jobsite";
$db_password = "";
$db_username = "root";

$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM job";

if (isset($_GET['location'])) {
    $location = $_GET['location'];
    $sql = "SELECT * FROM job WHERE location like '%$location%'";
} elseif (isset($_GET['salary_min'])) {
    $min_salary = (int)$_GET['salary_min'];
    $sql = "SELECT * FROM job WHERE salary >= $min_salary";
}
 elseif (isset($_GET['salary_max'])) {
    $max_salary = (int)$_GET['salary_max'];
    $sql = "SELECT * FROM job WHERE salary_max <= $max_salary";
} elseif (isset($location) && isset($min_salaty) && isset($max_salary)) {
    $location = $_GET['location'];
    $min_salary = (int)$_GET['salary_min'];
    $max_salary = (int)$_GET['salary_max'];
}

$result = mysqli_query($conn, $sql);
?>

<body>
    <header>JOBSITE</header>
    <div>
        <h1> <?php echo 'Available Jobs'; ?> </h1>
        <ul>

            <?php while ($row = mysqli_fetch_array($result)) {
            ?>
                <p> <?php echo "Title: <br>" . $row['title'] ?> <br>
                <p> <?php echo "Description: <br>" . $row['description'] ?> <br>
                <p> <?php echo "Location: <br>" . $row['location'] ?> <br>
                <p> <?php echo "Required_skill: <br>" . $row['required_skill'] ?> <br>
                <p> <?php echo "Required_experience: <br>" . $row['required_experience'] ?> <br>
                <p> <?php echo "salary: <br>" . $row['salary'] ?> <br><br><br>
                <?php
            }
                ?>
        </ul>
    </div>
</body>

</html>