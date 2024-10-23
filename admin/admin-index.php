<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .iframe-container {
            width: 100%;
            height: 600px; /* Adjust the height to fit your dashboard */
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
        <h1 class="header">Welcome, Administrator!</h1>
        <p>This is the Admin Panel. Below is the embedded Power BI dashboard:</p>

        <!-- Power BI Embed -->
        <div class="iframe-container">
            <iframe 
                width="100%" 
                height="100%" 
                src="https://app.powerbi.com/reportEmbed?reportId=48b0bac6-b417-4f35-9f04-23e9dd517938&autoAuth=true&embeddedDemo=true" 
                frameborder="0" 
                allowFullScreen="true"></iframe>
        </div>
    </div>
</body>
</html>
