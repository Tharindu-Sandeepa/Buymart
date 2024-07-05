<?php
// Establish a database connection
$servername = "localhost";  // Replace with your database server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "BuyMart";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to insert the new user
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    
    
    // Redirect to the login page
	
    header("Location: loginform.html");
	
    exit();
} else {
    echo "Error adding user: " . $conn->error;
}

$conn->close();
?>
