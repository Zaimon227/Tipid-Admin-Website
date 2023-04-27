<?php
    $username = "root";
    $password = "";
    $host = "localhost";
    $dbname = "tipid_db";

    $conn = mysqli_connect($host, $username, $password);
    mysqli_select_db($conn, $dbname);
    
?>