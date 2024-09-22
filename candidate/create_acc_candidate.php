<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobsite</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center"><h1>Create an Account</h1></div>
        <form action="create_acc_candidate.php" method="post">
            <div class="row mb-3">
            <input type="text" name="name" placeholder="Name">
            </div>
            <div class="row mb-3">
            <input type="text" name="email" placeholder="Email">
            </div>
            <div class="row mb-3">
            <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="row mb-3">
            <input type="text" name="skills" placeholder="Skills">
            </div>
            <div class="row mb-3">
            <input type="text" name="experience" placeholder="Experience">
            </div>
            <div class="row mb-3">
            <input type="text" name="location" placeholder="Location">
            </div>
            <div class="row mb-3">
            <input type="password" name="password" placeholder="Password">
            </div>
            <div class="row mb-3">
            <input type="submit" value="Create Account">
            </div>
        </form>
    </div>
</body>
</html>

<?php
    require_once("connect.php");

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) 
        && isset($_POST['skills']) && isset($_POST['experience']) 
            && isset($_POST['location']) && isset($_POST['password'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $skills = $_POST['skills'];
                $experience = $_POST['experience'];
                $location = $_POST['location'];
                $password = $_POST['password'];
                $sql = "INSERT INTO candidate (name, email, phone, skills, experience, location, password)
                        VALUES('$name', '$email', '$phone', '$skills', '$experience', '$location', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: index.php");
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

?>