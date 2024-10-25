<?php
session_start();

// Set session timeout duration (in seconds)
$timeout_duration = 300; // 5 minutes

// Check if the user is logged in by verifying if the session contains a username
if (!isset($_SESSION['username'])) {
    header("Location: \perspectiva\login\login.php"); // Redirect to login page if session doesn't exist
    exit();
}

// Check if the last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the duration of inactivity
    $elapsed_time = time() - $_SESSION['last_activity'];

    // If the user has been inactive for longer than the timeout duration, end the session and redirect to login
    if ($elapsed_time > $timeout_duration) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header("Location: login.php?session_expired=1"); // Redirect to login page with a session expired flag
        exit();
    }
}

// Update the last activity timestamp to the current time
$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .carousel {
            position: relative;
            max-width: 600px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-images img {
            width: 100%;
            max-width: 600px;
        }

        .carousel-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .button {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .welcome-header {
            text-align: center;
            /* Center align the welcome message */
            font-size: 28px;
            /* Font size for the welcome message */
            margin: 20px 0;
            /* Space around the welcome message */
            color: #800000;
            /* Maroon color for the text */
        }
    </style>
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
            <a href="login/user-logout.php">Logout</a> <!-- Link to the logout page -->
        </div>
    </div>
    <div class="content">
        <h1 class="welcome-header">Welcome, Batang Maloleño</h1> <!-- Added welcome header -->

        <div class="carousel">
            <div class="carousel-images" id="carouselImages">
                <img src="carousel1.jpg" alt="Image 1">
                <img src="carousel2.jpg" alt="Image 2">
                <img src="carousel3.jpg" alt="Image 3">
            </div>
            <div class="carousel-buttons">
                <button class="button" onclick="prevImage()">❮</button>
                <button class="button" onclick="nextImage()">❯</button>
            </div>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        const intervalTime = 3000; // Change image every 3 seconds
        let intervalId;

        function showImage(index) {
            const images = document.getElementById('carouselImages');
            const totalImages = images.children.length;
            currentIndex = (index + totalImages) % totalImages;
            images.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        function nextImage() {
            showImage(currentIndex + 1);
        }

        function prevImage() {
            showImage(currentIndex - 1);
        }

        function startCarousel() {
            intervalId = setInterval(nextImage, intervalTime);
        }

        function stopCarousel() {
            clearInterval(intervalId);
        }

        // Start the carousel when the page loads
        window.onload = startCarousel;

        // Optionally, stop the carousel when mouse hovers over
        document.querySelector('.carousel').addEventListener('mouseenter', stopCarousel);
        document.querySelector('.carousel').addEventListener('mouseleave', startCarousel);
    </script>
</body>

</html>