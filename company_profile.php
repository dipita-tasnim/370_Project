<!-- <?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Database connection details
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

// Fetch the email for the logged-in user
$loggedInUsername = $_SESSION['username'];
$sqlEmail = "SELECT email FROM login_company WHERE username = ?";
$stmtEmail = $conn->prepare($sqlEmail);
$stmtEmail->bind_param("s", $loggedInUsername);
$stmtEmail->execute();
$resultEmail = $stmtEmail->get_result();

if ($resultEmail->num_rows > 0) {
    $email = $resultEmail->fetch_assoc()['email'];
} else {
    echo "Error: Email not found.";
    $stmtEmail->close();
    $conn->close();
    exit();
}

$stmtEmail->close();

// Fetch company profile based on the email
$sqlProfile = "SELECT * FROM company WHERE email = ?";
$stmtProfile = $conn->prepare($sqlProfile);
$stmtProfile->bind_param("s", $email);
$stmtProfile->execute();
$resultProfile = $stmtProfile->get_result();

if ($resultProfile->num_rows > 0) {
    $company = $resultProfile->fetch_assoc();
} else {
    echo "Company profile not found.";
    $stmtProfile->close();
    $conn->close();
    exit();
}

$stmtProfile->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0e0e45;
            color: #fff;
            padding: 50px;
        }
        .profile-container {
            background-color: rgba(245, 245, 245, 0.9);
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-container p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Company Profile</h2>
        <p><strong>Company Name:</strong> <?php echo htmlspecialchars($company['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($company['email']); ?></p>
        <p><strong>Industry:</strong> <?php echo htmlspecialchars($company['industry']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($company['location']); ?></p>
    </div>
</body>
</html> -->
