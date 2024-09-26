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
        <div class="login">
            <h1 class="welcome">WELCOME</h1>
            <form class="login_form" action="login_check.php" method="POST">
                <input class="login_input" type="text" name="name" placeholder=" Name" required>
                <br>
                <input class="login_input" type="password" name="password" placeholder=" Password" required>
                <br>
                <h3>Choose only one option</h6>
                <div class="checkbox">
                    <input type="checkbox" name="candidate" >candidate
                    <input type="checkbox" name="employer" >employer
                </div>
                <br>
                <br>
                <input class="login_button" type="submit" value="LOGIN" name="login">
            </form>
            <br>
            <div class="create_acc">
                <button class="create_acc_candidate" onclick="location.href='create_acc_candidate.php'">Create Account as a CANDIDATE</button>
                <button class="create_acc_employer" onclick="location.href='../company/company_create.php'">Create Account as an EMPLOYER</button>
            </div>
        </div>
    </div>
</body>
</html>
