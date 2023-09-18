<?php
    session_start();
    include "config.php";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve input values
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Query database for existing user
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        // Check if user already exists
        if ($count > 0) {
            // Show error message
            $error = "Username already taken";
        } else {
            // Insert new user into database
            $

