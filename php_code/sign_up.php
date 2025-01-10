<?php
// Start output buffering
ob_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer library
require 'vendor/autoload.php'; // Adjust the path if necessary

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include'../includes/connect.php';
$mysqli= $connect;

// Create MySQLi connection
$mysqli = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    echo json_encode(["status" => "fail", "message" => "Database connection failed: " . $mysqli->connect_error]);
    exit();
}

// Get POST data from AJAX
$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $_POST['password']; // Get the raw password
$otp = rand(100000, 999999); // Generate OTP if needed
$username = $name; // Use name as username
$country = ''; // Replace with actual country data from the form if applicable
$state = ''; // Replace with actual state data from the form if applicable
$city = ''; // Replace with actual city data from the form if applicable
$status = 0; // Assuming 1 means active
$created_at = date("Y-m-d H:i:s");

// Check if the email already exists
$emailCheckSql = "SELECT COUNT(*) FROM `user` WHERE `email` = ?";
$emailCheckStmt = $mysqli->prepare($emailCheckSql);
$emailCheckStmt->bind_param("s", $email);
$emailCheckStmt->execute();
$emailCheckStmt->bind_result($emailCount);
$emailCheckStmt->fetch();
$emailCheckStmt->close();

if ($emailCount > 0) {
    echo json_encode(["status" => "fail", "message" => "You are already our member."]);
    $mysqli->close();
    exit();
}

// Prepare the SQL statement to insert new user
$sql = "INSERT INTO `user` (`otp`, `password`, `username`, `country`, `state`, `city`, `email`, `status`, `created_at`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Hash the password before storing it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
      $hashedPassword = $password; 

    // Bind parameters
    $stmt->bind_param("issssssis", $otp, $hashedPassword, $username, $country, $state, $city, $email, $status, $created_at);

    // Execute the statement
    if ($stmt->execute()) {
        // Send welcome email
        $mail = new PHPMailer(true);
        
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com'; // Use the correct SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'kshitiz@thetechindia.in'; // Your email
            $mail->Password = 'KshitizAwantika@123'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Change to PHPMailer::ENCRYPTION_SMTPS if using SSL
            $mail->Port = 465; // Change to 465 if using SSL

            // Enable debugging output
            $mail->SMTPDebug = 0; // Set to 2 for verbose debugging output

            // Recipients
            $mail->setFrom('kshitiz@thetechindia.in', 'The Tech India');
            $mail->addAddress($email, $name); // Add recipient

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to The Tech India';
            $mail->Body = 'Welcome to The Tech India. We are really happy to see you here. As now we are family members, celebrate it by sharing your first blog.';

            // Send email
            $mail->send();
            echo json_encode(["status" => "success", "message" => "User registration successful. A welcome email has been sent."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "success", "message" => "User registration successful, but email could not be sent: " . $mail->ErrorInfo]);
        }

    } else {
        echo json_encode(["status" => "fail", "message" => "User registration failed: " . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(["status" => "fail", "message" => "Statement preparation failed: " . $mysqli->error]);
}

// Close the database connection
$mysqli->close();

// End output buffering and flush output
ob_end_flush();
?>
