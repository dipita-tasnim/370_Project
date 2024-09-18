<?php
    require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobsite</title>
</head>
<body>
    <h1>Create an Account</h1>
    <form action="candidateORemployer.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>