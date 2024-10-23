<?php
// Include the database connection
include('../db_connection.php');

// Start the session
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../login/admin_login.php'); // Redirect to admin login page
    exit(); // Redirect if not logged in
}

// Handle form submissions for creating, modifying, or deleting accounts
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Code to create a new user account
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $barangay = $_POST['barangay'];

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (name, username, password, barangay, login_attempts, account_locked) VALUES (?, ?, ?, ?, 0, 0)");
        $stmt->bind_param("ssss", $name, $username, $password, $barangay);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Code to delete a user account
        $username = $_POST['username'];
        $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['modify'])) {
        // Code to modify an existing user account
        $username = $_POST['username'];
        $name = $_POST['name'];
        $barangay = $_POST['barangay'];

        $stmt = $conn->prepare("UPDATE users SET name = ?, barangay = ? WHERE username = ?");
        $stmt->bind_param("sss", $name, $barangay, $username);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['lift_restriction'])) {
        // Code to lift restriction from a user account
        $username = $_POST['username'];
        
        // Lifting the restriction
        $stmt = $conn->prepare("UPDATE users SET account_locked = 0, login_attempts = 0 WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all users to display
$result = $conn->query("SELECT * FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Management</title>
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
            background-color: #600000; /* Darker maroon */
        }
        .content {
            margin-left: 220px; /* Space for sidebar */
            padding: 20px;
        }
        .header {
            font-size: 24px;
            color: #800000; /* Maroon color */
        }
        /* Additional styles for user management page */
        .user-management-form {
            margin-bottom: 20px;
        }
        .user-list {
            width: 100%;
            border-collapse: collapse;
        }
        .user-list th, .user-list td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .user-list th {
            background-color: #f2f2f2; /* Light gray for headers */
        }
        .account-panel, .blocked-accounts {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9; /* Light background for forms */
            border: 1px solid #ccc;
        }
        .modify-button, .delete-button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #800000; /* Maroon */
            color: white;
            border: none;
            cursor: pointer;
        }
        .modify-button:hover, .delete-button:hover {
            background-color: #600000; /* Darker maroon on hover */
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
        <h1 class="header">User Account Management</h1>

        <h2>Accounts List</h2>
        <table class="user-list">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Barangay</th> <!-- Added Barangay column -->
                <th>Login Attempts</th>
                <th>Account Locked</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['barangay']); ?></td> <!-- Display Barangay -->
                <td><?php echo htmlspecialchars($user['login_attempts']); ?></td>
                <td><?php echo $user['account_locked'] ? 'Yes' : 'No'; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="account-panel">
            <h2>Modify Account</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="barangay" placeholder="Barangay" required>
                <button type="submit" name="modify" class="modify-button">Modify Account</button>
                <button type="submit" name="delete" class="delete-button">Delete Account</button>
            </form>
        </div>

        <div class="blocked-accounts">
            <h2>Blocked Accounts</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Username to lift restriction" required>
                <button type="submit" name="lift_restriction">Lift Restriction</button>
            </form>
        </div>

        <div class="user-management-form">
            <h2>Create New User Account</h2>
            <form method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="barangay" placeholder="Barangay" required>
                <button type="submit" name="create">Create Account</button>
            </form>
        </div>
    </div>
</body>
</html>
