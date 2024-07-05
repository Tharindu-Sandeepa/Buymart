<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buymart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the form data
$stmt = $conn->prepare("INSERT INTO contactus (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

// Set parameters and execute
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect to a thank you page
echo "<script>alert('Thank you for contacting us! We will get back to you soon.');</script>";

header("Location: loggedhome.php");
exit();


?>
