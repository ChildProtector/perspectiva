<?php
session_start();
include '../db_connection.php'; // Include the database connection file

// Check if the admin ID is set in the session
if (!isset($_SESSION['admin_id'])) {
    echo "Admin ID not found in session.";
    exit(); // Stop execution if the session variable is not set
}

$admin_id = $_SESSION['admin_id']; // Get the admin ID from the session

// Prepare and bind statement to get the admin's current username
$stmt = $conn->prepare("SELECT username FROM admins WHERE id = ?");
$stmt->bind_param("i", $admin_id); // Bind the admin ID
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    $current_username = $admin['username'];
} else {
    echo "Admin not found.";
    exit(); // Stop execution if the admin is not found
}

$stmt->close();

// Handle password update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify old password
    $stmt = $conn->prepare("SELECT password FROM admins WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin_data = $result->fetch_assoc();
        
        // Check if the old password matches
        if ($old_password === $admin_data['password']) {
            // Check if new passwords match
            if ($new_password === $confirm_password) {
                // Update the password
                $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $new_password, $admin_id); // Bind new password and admin ID
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "<script>alert('Password updated successfully.');</script>";
                } else {
                    echo "<script>alert('Error updating password.');</script>";
                }
            } else {
                echo "<script>alert('New passwords do not match.');</script>";
            }
        } else {
            echo "<script>alert('Old password is incorrect.');</script>";
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Link to the main CSS file -->
    <style>
        .sidebar {
            width: 200px;
            background-color: #800000; /* Maroon */
            color: white;
            height: 100vh; /* Full height */
            padding: 15px;
            position: fixed; /* Fix sidebar to the left */
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 10px 0;
        }
        .sidebar a:hover {
            background-color: #600000; 
        }
        .content {
            margin-left: 220px; 
            padding: 20px;
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            flex-direction: column; /* Stack elements vertically */
        }
        .header {
            font-size: 24px;
            color: #800000; 
            margin-bottom: 20px; /* Add space below the header */
        }
        .settings-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%; /* Full width within the max-width */
        }
        .settings-form input {
            width: calc(100% - 22px); /* Adjust for padding */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .settings-form button {
            background-color: #800000; /* Maroon */
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px; /* Space above the button */
        }
        .settings-form button:hover {
            background-color: #600000; /* Darker maroon on hover */
        }
        .username-section {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Space between username and button */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <a href="admin-index.php">Dashboard</a>
        <a href="inbox.php">Inbox</a>
        <a href="event-calendar.php">Event Calendar</a>
        <a href="news.php">News</a>
        <a href="user-management.php">User Account Management</a>
        <a href="analytical-tool.php">Analytical Tool</a>
        <a href="account-settings.php">Account Settings</a>
        <a href="logout.php">Logout</a>
    </div>
    
    <div class="content">
        <h1 class="header">Account Settings</h1>
        <div class="settings-form">
            <div class="username-section">
                <span>Username: <?php echo htmlspecialchars($current_username); ?></span> <!-- Current username -->
            </div>
            <form action="" method="post"> <!-- Action to the same page -->
                <input type="password" name="old_password" placeholder="Old Password" required>
                <input type="password" name="new_password" placeholder="New Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit">Update Password</button>
            </form>
        </div>
    </div>
</body>
</html>
