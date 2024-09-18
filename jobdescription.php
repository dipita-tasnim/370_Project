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

$sql = "SELECT * FROM jobs WHERE id = 1"; // Adjust the query as needed
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
