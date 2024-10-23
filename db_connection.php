<?php
$servername = "localhost";
$username = "root";
$password = "";  // leave it blank if you don't have a password set
$dbname = "user_admin_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
