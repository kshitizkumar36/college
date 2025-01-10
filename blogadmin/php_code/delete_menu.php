<?php
include'../../includes/connect.php';
if (isset($_POST['id'])) {
    $menuId = $_POST['id'];

    // Prepare the delete statement
    $query = "DELETE FROM `menu` WHERE `id` = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $menuId);

    if ($stmt->execute()) {
        echo "Menu item deleted successfully.";
    } else {
        echo "Error deleting menu item: " . $stmt->error;
    }
    $stmt->close();
}

$connect->close();
?>
