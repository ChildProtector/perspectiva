<?php
session_start(); // Start the session

// Database connection
$mysqli = new mysqli("localhost", "root", "", "user_admin_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize user data variables
$name = '';
$username = '';
$barangay = '';

// Check if the user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];

    // Retrieve the user information from the database
    $stmt = $mysqli->prepare("SELECT name, barangay FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $barangay = $user['barangay'];
    }

    $stmt->close(); // Close the statement
} else {
    // Handle the case where the user is not logged in
    echo "Please log in to send a message.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Administrator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <img src="logoweb.png" alt="My Logo" class="logo">
        <div class="links">
            <a href="index.php">Home</a> <!-- Home button to link to the landing page -->
            <a href="dashboard.php">Dashboard</a>
            <a href="news.php">News</a>
            <a href="event-calendar.php">Event Calendar</a>
            <a href="contact-admin.php">Contact Administrator</a>
            <a href="about-us.php">About Us</a>
            <a href="login/user-logout.php">Logout</a>
        </div>
    </div>
    
    <div class="content">
        <?php
        // Check if there is a message to display
        if (isset($_SESSION['message'])) {
            echo '<div class="alert">' . $_SESSION['message'] . '</div>'; // Display message
            unset($_SESSION['message']); // Clear the message after displaying it
        }
        ?>

        <form id="contact-form" action="submit_message.php" method="POST">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <input type="hidden" name="barangay" value="<?php echo htmlspecialchars($barangay); ?>">

            <div class="dropdown-container">
                <label for="barangay">Select your barangay:</label>
                <select id="barangay" class="barangay-select" name="barangay" required>
                    <option value="<?php echo htmlspecialchars($barangay); ?>"><?php echo htmlspecialchars($barangay); ?></option>
                    
                </select>
            </div>
            <div class="message-box">
                <textarea class="message-input" name="message" maxlength="1000" minlength="50" placeholder="Type your message here..." required></textarea>
            </div>
            <button type="submit" class="send-button">Send</button>
        </form>
    </div>

    <style>
        .alert {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            padding: 10px;
            border: 1px solid #c3e6cb; /* Green border */
            border-radius: 5px;
            margin: 15px 0; /* Space around the alert */
        }
    </style>
</body>
</html>
