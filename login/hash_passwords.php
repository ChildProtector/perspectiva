<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "user_admin_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Select all users
$result = $mysqli->query("SELECT id, password FROM users");

while ($user = $result->fetch_assoc()) {
    // Hash the existing password
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    // Update the user record with the hashed password
    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $hashed_password, $user['id']);
    $stmt->execute();
}

// Close the connection
$mysqli->close();
echo "Passwords hashed successfully.";
?>
