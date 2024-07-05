<?php
require_once 'config.php';

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check if the username exists
$sql = "SELECT * FROM admin WHERE email = '$username'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the entered password with the hashed password in the database
    if (password_verify($password, $hashedPassword)) {
        // Start a new session
        session_start();
	
        $_SESSION['name'] = $row['name'];
    
        // Redirect to the welcome page
        header("Location: dashboard.php");
    } else {
        // If the password is incorrect, redirect back to the login page
        header("Location: ../home page/loginagain.html");
    }
} else {
    // If no matching user found, redirect back to the login page
    header("Location: ../home page/loginagain.html");
}

$conn->close();
?>
