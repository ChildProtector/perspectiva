<?php
include('db_connection.php'); // Ensure this is included correctly

// Fetch news from the database
$sql = "SELECT barangay, news_title, news_content, news_image FROM news ORDER BY news_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <img src="logoweb.png" alt="My Logo" class="logo">
        <div class="links">
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="news.php">News</a>
            <a href="event-calendar.php">Event Calendar</a>
            <a href="contact-admin.php">Contact Administrator</a>
            <a href="about-us.php">About Us</a>
            <a href="login/user-logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <h1 class="header">News and Announcements</h1>
        <div class="post-panel">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    
                    // Correcting the image path
                    $imagePath = htmlspecialchars($row['news_image']); // news_image already contains 'uploads/'

                    echo '<img src="' . $imagePath . '" alt="News Image" class="news-image">'; // Display the image
                    echo '<p>Barangay: ' . htmlspecialchars($row['barangay']) . '</p>';
                    echo '<h3>' . htmlspecialchars($row['news_title']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['news_content']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No news available.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
