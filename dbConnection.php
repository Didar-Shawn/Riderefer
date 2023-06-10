<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "transportation";
    // Establish a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>