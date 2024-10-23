<?php
session_start(); // Start the session

// Connect to the database
$conn = new mysqli("localhost", "root", "", "user_admin_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the delete button was clicked
if (isset($_POST['delete'])) {
    // Check if any message IDs were selected
    if (isset($_POST['message_ids']) && !empty($_POST['message_ids'])) {
        $message_ids = $_POST['message_ids'];

       
        $ids = implode(',', array_map('intval', $message_ids)); 
        $sql = "DELETE FROM inbox WHERE id IN ($ids)";

        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Selected messages have been deleted successfully."; 
        } else {
            $_SESSION['message'] = "Error deleting messages: " . $conn->error; 
        }
    } else {
        $_SESSION['message'] = "No messages selected for deletion."; 
    }
}

header("Location: inbox.php");
exit();

$conn->close();
?>
