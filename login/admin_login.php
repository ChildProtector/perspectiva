<?php
session_start(); // Start the session
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="login.css"> <!-- Use the same CSS for styling -->
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="submit_admin_login.php" method="post"> <!-- Adjust action to your admin login processing script -->
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
