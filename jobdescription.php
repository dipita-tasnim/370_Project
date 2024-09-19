<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT job_id,title,location,required_skill,required_experience,salary,posted_date * FROM job"; // getting the info from job table
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
