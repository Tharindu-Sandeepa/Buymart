<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// Display a welcome message with the username
echo "Hello, " . $_SESSION['username'];
?>
