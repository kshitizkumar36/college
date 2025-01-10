<?php
// Database connection
include '../includes/connect.php';

// Check connection
if ($connect->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $connect->connect_error]));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $agreed = isset($_POST['agree']) ? 1 : 0;

    if ($email && $agreed) {
        // Prepare and execute the SQL statement
        $stmt = $connect->prepare("INSERT INTO subscribers (email, agreed_to_terms) VALUES (?, ?)");
        $stmt->bind_param("si", $email, $agreed);

        if ($stmt->execute()) {
            $response = ["status" => "success", "message" => "Subscription successful!"];
        } else {
            $response = ["status" => "error", "message" => "Subscription failed! Please try again."];
        }

        $stmt->close();
    } else {
        $response = ["status" => "invalid", "message" => "Invalid email or terms not agreed to."];
    }

    $connect->close();
    // Return JSON response
    echo json_encode($response);
    exit;
}
?>
