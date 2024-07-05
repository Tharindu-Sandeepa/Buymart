<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buymart";

require_once 'config.php';

// Get values from the form
$username = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the "admin" table
$sql = "INSERT INTO admin (name,email,password) VALUES ('$username','$email', '$hashedPassword')";
if ($conn->query($sql) === TRUE) {
   header("location:dashboard.php");
} else {
    echo "Error adding support team member: " . $conn->error;
}

$conn->close();
?>
