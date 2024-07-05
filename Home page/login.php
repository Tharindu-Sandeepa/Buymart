<?php
// Establish a database connection
$servername = "localhost";  // Replace with your database server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "buymart";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check if the username and password match
$sql = "SELECT * FROM customer WHERE userName = '$username'";
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
       

        // Redirect to the dashboard page
        header("Location: ../reguser/loggedhome.php");
        exit();
    }
}

// If no matching user found or password does not match, redirect back to the login page
header("Location: loginagain.html");
exit();

$conn->close();
?>
