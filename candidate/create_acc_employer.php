<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create an Account</h1> 
    <form action="create_acc_employer.php" method="post">
        <input type="text" name="name" placeholder="Your Name">
        <br>
        <input type="text" name="company" placeholder="The Name of Your Company">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="industry" placeholder="Industry">
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
    require_once ("connect.php");

    if(isset($_POST['name']) && isset($_POST['company']) && isset($_POST['email']) 
        && isset($_POST['industry']) && isset($_POST['location']) 
            && isset($_POST['password'])){
                $name = $_POST['name'];
                $company = $_POST['company'];
                $email = $_POST['email'];
                $industry = $_POST['industry'];
                $location = $_POST['location'];
                $password = $_POST['password'];
                $sql = "INSERT INTO company (name, company, email, industry, location, password)
                        VALUES('$name', '$company', '$email', '$industry', '$location', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: index.php");
                }
                else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

?>