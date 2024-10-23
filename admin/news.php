<?php
include 'db_connection.php'; // Include your database connection file

// Fetch news titles and IDs from the database
$sql = "SELECT news_id, news_title FROM news ORDER BY news_id DESC"; // Adjusted query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin News Management</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Link to the main CSS file -->
    <style>
        /* Sidebar styles */
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
            margin-left: 300px; /* Space for sidebar */
            padding: 20px;
            display: flex;
            flex-direction: column; /* Stack elements vertically */
        }
        .header {
            font-size: 24px;
            color: #800000; /* Maroon color */
            margin-bottom: 20px; /* Space below header */
            text-align: center; /* Center the header text */
        }
        /* Form styles */
        .news-form, .delete-form {
            margin-top: 20px;
            max-width: 600px; /* Max width for forms */
            background-color: #f9f9f9; /* Light background for forms */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .news-form select, .news-form input, .news-form textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            width: 100%; /* Full width */
            box-sizing: border-box; /* Include padding in total width */
        }
        .news-form button, .delete-form button {
            padding: 10px;
            background-color: #800000;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Full width button */
            margin-top: 10px; /* Space above button */
        }
        .news-form button:hover, .delete-form button:hover {
            background-color: #600000;
        }
        /* News list table styles */
        .news-table {
            margin-top: 20px; /* Space above the news table */
            width: 100%; /* Full width */
            border-collapse: collapse; /* Collapse borders */
        }
        .news-table th, .news-table td {
            border: 1px solid #ddd; /* Add borders */
            padding: 8px; /* Padding for cells */
            text-align: left; /* Align text to the left */
        }
        .news-table th {
            background-color: #800000; /* Maroon header */
            color: white; /* White text */
        }
        .news-table tr:hover {
            background-color: #f5f5f5; /* Light gray on hover */
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
        <h1 class="header">News Management</h1>
        
        <!-- Form for submitting news -->
        <form class="news-form" method="post" action="submit_news.php" enctype="multipart/form-data">
            <select name="barangay" required>
                <option value="">Select Barangay</option>
                <option value="barangay1">Barangay 1</option>
                <option value="barangay2">Barangay 2</option>
                <option value="barangay3">Barangay 3</option>
            </select>
            <input type="text" name="news_id" placeholder="News ID" required>
            <input type="text" name="news_title" placeholder="News Title" required>
            <textarea name="news_content" rows="4" placeholder="Write your news here..." required></textarea>
            <input type="file" name="news_image" accept="image/*" required>
            <button type="submit">Submit News</button>
        </form>

        <!-- Form for deleting news -->
        <div class="delete-form">
            <h2>Delete News Post</h2>
            <form action="delete_news.php" method="POST">
                <input type="text" name="delete_news_id" placeholder="Enter News ID to delete" required>
                <button type="submit">Delete Post</button>
            </form>
        </div>

        <!-- Table for displaying news -->
        <h2>Submitted News</h2>
        <table class="news-table">
            <thead>
                <tr>
                    <th>News ID</th>
                    <th>News Title</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['news_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['news_title']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No news available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
