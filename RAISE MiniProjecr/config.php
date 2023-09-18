<?php
    $host = "localhost";
    $username = "yourusername";
    $password = "yourpassword";
    $dbname = "yourdatabase";

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
