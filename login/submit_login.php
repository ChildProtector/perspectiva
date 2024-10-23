<?php
session_start(); // Start the session

// Database connection
$mysqli = new mysqli("localhost", "root", "", "user_admin_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize variables
$username = isset($_POST['username']) ? $_POST['username'] : ''; // Ensure username is set
$password = isset($_POST['password']) ? $_POST['password'] : ''; // Ensure password is set

// Prepare and bind the statement to retrieve user information
$stmt = $mysqli->prepare("SELECT id, password, login_attempts, account_locked FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Check if the account is locked
    if ($user['account_locked']) {
        echo "Your account is locked due to multiple failed login attempts.";
        exit;
    }

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Password is correct, reset login attempts and start the session
        $stmt = $mysqli->prepare("UPDATE users SET login_attempts = 0 WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        // Store user information and set session expiration timer
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id']; // Store user ID if needed
        $_SESSION['last_activity'] = time(); // Store the current time for session expiration

        // Redirect to the user dashboard or another page
        header("Location: /perspectiva/index.php");
        exit();
    } else {
        // Increment login attempts
        $new_attempts = $user['login_attempts'] + 1;

        // Lock account if attempts exceed 5
        $account_locked = ($new_attempts >= 5) ? 1 : 0;

        // Update the login attempts and account status
        $stmt = $mysqli->prepare("UPDATE users SET login_attempts = ?, account_locked = ? WHERE username = ?");
        $stmt->bind_param("iis", $new_attempts, $account_locked, $username);
        $stmt->execute();

        echo "Invalid username or password. Attempt $new_attempts/5.";
        exit();
    }
} else {
    echo "Invalid username or password.";
    exit();
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>