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

// Get cont_id from query parameter
$contId = $_GET['cont_id'];

// Delete row
$sql = "DELETE FROM contactus WHERE cont_id = $contId";
if ($conn->query($sql) === TRUE) {
    header("location:msz.php");
} else {
    echo "Error deleting row: " . $conn->error;
}

$conn->close();
?>
