<?php
include '../includes/connect.php';


// Get the search query
$query = isset($_GET['query']) ? $connect->real_escape_string($_GET['query']) : '';

// Fetch matching post titles and IDs
$sql = "SELECT id, title FROM posts WHERE title LIKE '%$query%' LIMIT 5";
$result = $connect->query($sql);

$suggestions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = ['id' => $row['id'], 'title' => $row['title']];
    }
}

// Return suggestions as JSON
echo json_encode($suggestions);

$connect->close();
?>
