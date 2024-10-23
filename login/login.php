<?php
session_start(); // Start the session at the top of the file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back!</h1>

        <!-- Display error message if login fails or session expires -->
        <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] == 'session_expired'): ?>
                <p style="color: red;">Your session has expired due to inactivity. Please log in again.</p>
            <?php elseif ($_GET['error'] == 'invalid_credentials'): ?>
                <p style="color: red;">Invalid username or password. Please try again.</p>
            <?php endif; ?>
        <?php endif; ?>

        <form action="submit_login.php" method="post"> <!-- Link to your login processing script -->
            <input type="text" name="username" placeholder="Username" required> 
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAAXNSR0IArs4c6QAAAMhJREFUOE+tk4sNwjAMRN1NYBPYBDaBSYBJgElgE8irGsmktuNIWKrSn1/vLu4kf6qpw9mIyKEcbxF5LKvZEoF2InJXXcBu5fpkkSLQx2gAth0BYefi2N4vNn8ee4paW7oJRShLgQiZfFh1DVujuYUBOVq2eLm3/RW4spK1VgF65ZxZSs8RltgxArfKtNhai3arDf1ccrzWmxqEkpcn3RlOZmrOT4OiIfT4qJp/GQ0iF2AjRfioWoHaAexBn5aiXlP4PDOQqQ98ATrEIhMxJ5CnAAAAAElFTkSuQmCC"/>
            <input type="password" name="password" placeholder="Password" required> 
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAAXNSR0IArs4c6QAAALBJREFUOE/tlO0NgkAQRB+dSCdaiXSiVqJWop1IJ8KY9XIcty4k+s9JCOFjH3M7yzV8SU3A2QDdePTA3c7Vkk8gAc5ZlWDX8fpYI3mgLXADLsDJCg/mbmfuJjwPJCdy1GbL0TIfBp658kByI+nrubz7rAW52ZSgd0p7q1Bza5qlWIJkXY1eIsHUw5dK0HMJIXsn1f9Bceo/69Ga+LUbpMmvDaTmSIMZafK/RftRBEvPB4DmIBOineFhAAAAAElFTkSuQmCC"/>
            <button type="submit">Login</button> <br><br>
            <a href="/forgot_password" class="forgot-password">Forgot Password?</a> <br>
            <a href="admin_login.php" class="account-request">Login as Administrator</a> <!-- Link to admin login -->
        </form>
    </div>
</body>
</html>
