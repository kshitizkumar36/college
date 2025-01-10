<?php
// Start the session (if not already started)
session_start();

// Destroy all session data
session_unset();   // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the index page
header("Location: ../index.php");
exit();
