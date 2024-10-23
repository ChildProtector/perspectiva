<?php
session_start();
include '../db_connection.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); // Check plain text password (You might want to hash passwords later)

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch admin details
        $admin = $result->fetch_assoc();

        // Store admin ID and username in the session
        $_SESSION['admin_id'] = $admin['id'];  // Store admin ID
        $_SESSION['admin_username'] = $admin['username']; // Store admin username

        // Redirect to your admin dashboard
        header("Location: ../admin/admin-index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}
$conn->close();
?>
