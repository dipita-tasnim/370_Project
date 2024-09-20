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
        <form class="login_form" action="login_check.php" method="POST">
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