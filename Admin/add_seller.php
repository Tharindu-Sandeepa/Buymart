<?php

require_once 'config.php';

// form data
$bus_name = $_POST['bus_name'];
$bus_email = $_POST['bus_email'];
$username = $_POST['username'];
$password = $_POST['password'];
$location = $_POST['location'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL query to insert the seller into the database
$sql = "INSERT INTO seller (bus_name, bus_email, username, password, location)
        VALUES ('$bus_name', '$bus_email', '$username', '$hashedPassword', '$location')";

if ($conn->query($sql) === TRUE) {
     header("location:dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
