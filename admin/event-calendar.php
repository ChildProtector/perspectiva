<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Event Calendar</title>
    <link rel="stylesheet" href="../styles.css"> <!-- Link to the main CSS file -->
    <style>
        .sidebar {
            width: 200px;
            background-color: #800000; /* Maroon */
            color: white;
            height: 100vh;
            padding: 15px;
            position: fixed;
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
        .event-form {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event-form input, .event-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .event-form button, .delete-button {
            background-color: #ffeb3b;
            border: none;
            border-radius: 4px;
            color: #333;
            padding: 10px 20px;
            cursor: pointer;
        }
        .event-form button:hover, .delete-button:hover {
            background-color: #fdd835;
        }
        .event-list {
            margin-top: 40px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        <a href="../login/logout.php">Logout</a>
    </div>
    <div class="content">
        <h1 class="header">Event Calendar</h1>

        <!-- Event Form -->
        <div class="event-form">
            <form action="submit_event.php" method="POST">
                <input type="text" name="event_id" placeholder="Event ID" required>
                <input type="date" name="event_date" required>
                <input type="text" name="event_name" placeholder="Event Name" required>
                <input type="text" name="event_place" placeholder="Event Place" required>
                <textarea name="event_description" placeholder="Event Description" required></textarea>
                <button type="submit">Add Event</button>
            </form>
        </div>

     
        <div class="event-list">
            <h2>Delete Event</h2>
            <form action="delete_event.php" method="POST">
                <input type="text" name="delete_event_id" placeholder="Enter Event ID to delete" required>
                <button type="submit" class="delete-button">Delete Event</button>
            </form>
        </div>

        
        <div class="event-list">
            <h2>Upcoming Events</h2>
            <?php
            
            include('db_connection.php');

           
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);

           
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='event'>";
                    echo "<h3>" . htmlspecialchars($row['event_name']) . "</h3>";
                    echo "<p>Date: " . htmlspecialchars($row['event_date']) . "</p>";
                    echo "<p>Place: " . htmlspecialchars($row['event_place']) . "</p>";
                    echo "<p>Description: " . htmlspecialchars($row['event_description']) . "</p>"; // Show event description
                    echo "</div>";
                }
            } else {
                echo "No events found.";
            }
            ?>
        </div>
    </div>
</body>
</html>
