<?php
include'../../includes/connect.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Get POST data
$menu_name = $_POST['menu_name'];
$menu_details = $_POST['menu_details'];
$menu_icon = $_POST['menu_icon'];
$target_page = $_POST['target_page'];
$status = 1; // Default status (e.g., active)
$updated_at = date('Y-m-d H:i:s');
$created_at = date('Y-m-d H:i:s');

// Prepare and bind
$stmt = $connect->prepare("INSERT INTO `menu`(`menu`, `details`, `icon`, `target_page`) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $menu_name, $menu_details, $menu_icon, $target_page);

// Execute the statement
if ($stmt->execute()) {
    echo "New menu item created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$connect->close();
?>
