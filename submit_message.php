<?php
session_start(); // Start the session

// Database connection
$conn = new mysqli("localhost", "root", "", "user_admin_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the input values
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $barangay = $conn->real_escape_string($_POST['barangay']);
    $message = $conn->real_escape_string($_POST['message']);

    // Validate the message length
    $message_length = strlen($message);
    if ($message_length < 50 || $message_length > 1000) {
        die("Message must be between 50 and 1000 characters.");
    }

    // Insert the message into the inbox
    $sql = "INSERT INTO inbox (sender_name, sender_username, sender_barangay, message, created_at) 
            VALUES ('$name', '$username', '$barangay', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Your message has been sent."; // Set session message
    } else {
        $_SESSION['message'] = "Error: " . $conn->error; // Set error message
    }
}

// Close the database connection
$conn->close();

// Redirect back to the contact page
header("Location: contact-admin.php");
exit();
?>
