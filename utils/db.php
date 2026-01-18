<?php
    ini_set('display_errors', 1);
    ini_set('displaye_startup_errors', 1);
    error_reporting(E_ALL);

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "datapfb_db";

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if(!$conn){
        die("Connection failed!" . mysqli_connect_error());
    }
?>