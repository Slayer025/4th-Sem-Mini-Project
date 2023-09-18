<?php
    session_start();
    include "config.php";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve input values
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Query database for user
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        // Check if user exists and password is correct
        if ($count == 1) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            
            // Redirect to main webpage
            header("Location: index.php");
            exit;
        } else {
            // Show error message
            $error = "Invalid username or password";
        }
    }
?>

<html>
<head>
    <title>Login - Faculty Information System</title>
    <style>
        body {
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Register</a>.</p>
    
    <?php
        // Show error message if login fails
        if (isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
</body>
</html>
