<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobsite</title>
</head>
<body>
    <h1>Create an Account</h1>
    <form action="create_acc_candidate.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="phone" placeholder="Phone">
        <br>
        <input type="text" name="skills" placeholder="Skills">
        <br>
        <input type="text" name="experience" placeholder="Experience">
        <br>
        <input type="text" name="location" placeholder="Location">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="submit" value="Create Account">
    </form>

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