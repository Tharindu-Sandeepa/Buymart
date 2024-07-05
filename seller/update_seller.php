<?php
// Retrieve the form data
$busName = $_POST['busName'];
$busEmail = $_POST['busEmail'];
$username = $_POST['username'];
$password = $_POST['password'];
$location = $_POST['location'];

// Update the seller data in the database
// Replace the database connection details with your own
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "buymart";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start the session

// Assuming you have a logged-in seller with a specific username, you can retrieve their username from the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Retrieve the username from the session

    // Hash the password before updating it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE seller SET bus_name = '$busName', bus_email = '$busEmail', username = '$username', password = '$hashedPassword', location = '$location' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Seller data updated successfully.";
    } else {
        echo "Error updating seller data: " . $conn->error;
    }
} else {
    echo "Seller username not found in the session.";
}

$conn->close();
?>
