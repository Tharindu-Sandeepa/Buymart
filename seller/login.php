<?php
require_once 'config.php';

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to retrieve the hashed password and seller ID from the database
$sql = "SELECT password, seller_id FROM seller WHERE username = '$username'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];
    $sellerId = $row['seller_id'];

    // Verify the entered password against the stored hashed password
    if (password_verify($password, $hashedPassword)) {
        // Start a new session
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['seller_id'] = $sellerId;

        // Redirect to the dashboard page
        header("Location: dashboard.php");
        exit();
    }
}

// If no matching user found or password does not match, redirect back to the login page
header("Location: ../home page/loginagain.html");
exit();

$conn->close();
?>
