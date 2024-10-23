<?php
// Include the database connection
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs
    $event_id = $conn->real_escape_string($_POST['event_id']);
    $event_date = $conn->real_escape_string($_POST['event_date']);
    $event_name = $conn->real_escape_string($_POST['event_name']);
    $event_place = $conn->real_escape_string($_POST['event_place']);
    $event_description = $conn->real_escape_string($_POST['event_description']); // Capture the event description

    // Prepare SQL to insert event details
    $sql = "INSERT INTO events (event_id, event_name, event_date, event_place, event_description) 
            VALUES ('$event_id', '$event_name', '$event_date', '$event_place', '$event_description')";

    if ($conn->query($sql) === TRUE) {
        // Show an alert if successful
        echo "<script>alert('Event added successfully!'); window.location.href='event-calendar.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
