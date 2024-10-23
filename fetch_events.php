<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default password is blank
$dbname = "user_admin_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database, including description, place, and event ID
$sql = "SELECT event_id, event_name, event_date, event_place, event_description FROM events"; 
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $date = date('Y-m-d', strtotime($row['event_date'])); // Format date to YYYY-MM-DD
        $events[$date][] = [
            'id' => $row['event_id'], // Add event_id
            'name' => $row['event_name'],
            'place' => $row['event_place'], // Add place
            'description' => $row['event_description'] // Add description
        ];
    }
}

// Close connection
$conn->close();

// Return events as JSON
header('Content-Type: application/json');
echo json_encode($events);
?>
