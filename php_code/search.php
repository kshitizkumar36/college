<?php
// Database connection
include '../includes/connect.php';

// Get the search query from the request
$query = isset($_GET['query']) ? $connect->real_escape_string($_GET['query']) : '';

// Search the posts table
$sql = "SELECT id FROM posts WHERE title LIKE '%$query%' LIMIT 1";
$result = $connect->query($sql);

// Check if a result was found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'id' => $row['id']]);
} else {
    echo json_encode(['success' => false]);
}

$connect->close();
?>
