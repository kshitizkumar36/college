<?php
session_start();
$host = "localhost";
$user = "root";
$password = ""; // Add an empty string here if there’s no password
$dbname = "blog";

// Correcting the mysqli connection syntax
$connect = mysqli_connect($host, $user, $password, $dbname);

// Checking the mysqli connection
if (!$connect) {
    echo json_encode(["status" => "fail", "message" => "MySQLi connection failed: " . mysqli_connect_error()]);
    exit();
}

try {
    // PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["status" => "fail", "message" => "PDO connection failed: " . $e->getMessage()]);
    exit();
}

?>
