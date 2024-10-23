<?php
session_start(); // Start the session

// Database connection
$conn = new mysqli("localhost", "root", "", "user_admin_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display session message if it exists
if (isset($_SESSION['message'])) {
    echo '<div class="message" style="color: green; font-weight: bold;">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Clear the message after displaying it
}

// Fetch messages from the database
$sql = "SELECT * FROM inbox ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inbox</title>
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
        }
        .header {
            font-size: 24px;
            color: #800000; 
        }
        .message-list {
            margin-top: 20px;
        }
        .message-item {
            background-color: white; 
            border: 1px solid #ddd;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            display: flex; 
            align-items: center; 
        }
        .message-item input[type="checkbox"] {
            margin-right: 10px;
        }
        .action-buttons {
            margin: 20px 0; 
            text-align: right; 
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            background-color: #e6ffe6; /* Light green background */
            border: 1px solid #4CAF50; /* Green border */
            border-radius: 5px;
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
        <h1 class="header">Inbox</h1>
        <form action="inbox_actions.php" method="POST">
            <div class="action-buttons">
                <button type="submit" name="delete">Delete Selected</button>
            </div>
            <div class="message-list">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="message-item">
                            <input type="checkbox" name="message_ids[]" value="<?php echo $row['id']; ?>">
                            <div class="message-content">
                                <strong>From:</strong> <?php echo htmlspecialchars($row['sender_username']); ?> (<?php echo htmlspecialchars($row['sender_barangay']); ?>)
                                <br>
                                <strong>Message:</strong> <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                <br>
                                <strong>Date:</strong> <?php echo htmlspecialchars($row['created_at']); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="message-item">
                        <div class="message-content">No messages.</div>
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
