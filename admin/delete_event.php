<?php
// delete_news.php


include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_news_id = $_POST['delete_news_id'];

    
    $stmt = $conn->prepare("DELETE FROM news WHERE news_id = ?");
    $stmt->bind_param("s", $delete_news_id);
    
    if ($stmt->execute()) {
        echo "News post deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


$conn->close();
?>
