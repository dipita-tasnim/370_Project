<?php
        $db_server = "localhost";
        $db_name = "jobsite";
        $db_password = "";
        $db_username = "root";
    
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
    
        if(!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }
        $location = $_GET['location'];
        $min_salary = (int)$_GET['salary_min'];
        $max_salary = (int)$_GET['salary_max'];

        if(isset($location)){
            $sql = "SELECT * FROM job WHERE location like '%$location%'";
            
        }
        elseif (isset($min_salaty)){
            
        }
        elseif (isset($max_salary)){
            
        }
        elseif(isset($location) && isset($min_salaty) && isset($max_salary)){
            
        }
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            echo $row['title']; 
            echo $row['description'];
            echo $row['location'];
            echo $row['required_skill'];
            echo $row['required_experience'];
            echo $row['salary'];
        }

        ?>