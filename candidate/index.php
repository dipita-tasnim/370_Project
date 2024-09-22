<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB SITE 101</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <div class="bg">
        <h1 class="welcome">WELCOME</h1>
        <form class="login_form" action="login_check.php" method="POST">
            <input class="login_input" type="text" name="name" placeholder="Name">
            <br>
            <input class="login_input" type="password" name="password" placeholder="Password">
            <br>
            <input type="checkbox" name="candidate">candidate
            <input type="checkbox" name="employer">employer
            <br>
            <input type="submit" value="LOGIN" name="login">
        </form>
        <button class="create_acc_candidate" onclick="location.href='create_acc_candidate.php'">Create Account as a CANDIDATE</button> 
        <button class="create_acc_employer" onclick="location.href='../company/company_create.php'">Create Account as an EMPLOYER</button>
    </div>
</body>
</html>
