<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or any other page as per your requirement
    header('Location: index.php');
    exit();
}

// Destroy the session and redirect to the login page
session_destroy();
header('Location: index.php');
exit();
?>
