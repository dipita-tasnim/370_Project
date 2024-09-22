<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB SITE 101</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="bg">
        <h1 class="welcome">WELCOME</h1>
        <form class="login_form" action="index.php" method="POST">
            <div>
                <label class="input_lable">USERNAME: </label>
                <input class="login_input" type="text" name="username">
            </div>
            <br>
            <div>
                <label class="input_lable">PASSWORD: </label>
                <input class="login_input" type="password" name="password">
            </div>
            <br>
                <input type="submit" value="LOGIN" name="login">
        </form>
        <button class="create_acc" onclick="location.href='create_acc.php'">Create Account</button>
    </div>
</body>
</html>





<?php
 session_start();
 require_once("connect.php");

 if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

     $sql1 = "SELECT user_id, username, password FROM users WHERE username = '$username' AND password = '$password'";
     $result1 = mysqli_query($conn, $sql1);

     if(mysqli_num_rows($result1) > 0) {
      
         $user = mysqli_fetch_assoc($result1);
        $_SESSION['user_id'] = $user['user_id'];  // Store user_id in session

        $user_id = $_SESSION['user_id'];  // Retrieve user_id from session
        $sql2 = "SELECT * FROM candidate WHERE user_id = '$user_id'";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            header("Location: candidate_profile_display.php");
            exit();
        }

       
        $sql3 = "SELECT * FROM company WHERE user_id = '$user_id'";
         $result3 = mysqli_query($conn, $sql3);
        
         if (mysqli_num_rows($result3) > 0) {
            header("Location: ../company/company_profile.php");
             exit();
         }

     } else {
         echo "Invalid username or password!";
    }
}
 
?>