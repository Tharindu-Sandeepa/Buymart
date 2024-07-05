<?php
require_once 'config.php';

// Get values from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the "supteam" table
$sql = "INSERT INTO supteam (username, password) VALUES ('$username', '$hashedPassword')";
if ($conn->query($sql) === TRUE) {
    echo "Support team member added successfully.";
} else {
    echo "Error adding support team member: " . $conn->error;
}

$conn->close();
?>
