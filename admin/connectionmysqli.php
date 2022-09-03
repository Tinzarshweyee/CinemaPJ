<?php
    try {
        $con = mysqli_connect("localhost", "root", "", "jcgv_cinema");
        
        if($con->connect_errno) {
            echo "Connection Failed to MySQL Database: ".$con->connect_error;
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>