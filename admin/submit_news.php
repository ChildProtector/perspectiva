<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form data
    $barangay = $_POST['barangay'];
    $news_id = $_POST['news_id'];
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];
    $news_image = $_FILES['news_image'];

    // Set the target directory for uploads
    $target_dir = "uploads/"; // Relative path
    $target_file = $target_dir . basename($news_image["name"]);

    // Check if uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Create uploads directory if it doesn't exist
    }

    // Move the uploaded file
    if (move_uploaded_file($news_image["tmp_name"], $target_file)) {
        // Insert news into the database
        $sql = "INSERT INTO news (barangay, news_id, news_title, news_content, news_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $barangay, $news_id, $news_title, $news_content, $target_file); // Store relative path
        if ($stmt->execute()) {
            echo "News submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
