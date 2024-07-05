<?php
require_once 'config.php';

// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL query to insert the customer into the database
$sql = "INSERT INTO customer (userName, email, first_name, last_name, phone_number, password)
        VALUES ('$name', '$email', '$first_name', '$last_name', '$phone_number', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    header("location:dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
