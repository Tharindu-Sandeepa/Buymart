<?php
require_once 'config.php';

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to retrieve the hashed password from the database
$sql = "SELECT password FROM supteam WHERE username = '$username'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the entered password against the stored hashed password
    if (password_verify($password, $hashedPassword)) {
        // Start a new session
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to the dashboard page or any other desired location
        header("Location: dashboard.php");
        exit();
    } else {
        // Incorrect password
        header("Location:../home page/loginagain.html");
        exit();
    }
} else {
    // User not found
    header("Location: ../home page/loginagain.html");
    exit();
}

$conn->close();
?>
