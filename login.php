
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobsite";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}else{
    // echo "Connection Established";
    mysqli_select_db($conn, $dbname);
}
?>





<?php
// require_once('DBconnect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM login_company WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        // echo "Let him enter";
        header("Location: home.php");
    }
    else{
        echo "Wrong username or password";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login_style.css" />
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <title>JOBSITE</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav_logo">
          <h1><a href="index.php">JOBSITE</a></h1>
        </div>
        <ul class="nav_link">
          <!-- <li><a href="show_students.php">Students</a></li>
          <li><a href="#">Teachers</a></li> -->
        </ul>
      </nav>
    </header>
    <main>
      <section class="login">
        <div class="login_box">
          <h1>Login</h1>
          <form class="login_form" action="login.php" method="post">
            <input
              type="text"
              id="username"
              name="username"
              placeholder="username"
            />
            <input
              type="password"
              id="password"
              name="password"
              placeholder="password"
            />
            <input type="submit" value="Submit" />
          </form>
        </div>
      </section>
    </main>
  </body>
</html>













