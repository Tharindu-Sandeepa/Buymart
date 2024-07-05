<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buymart";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the order ID from the AJAX request
$order_id = $_POST["order_id"];

// Delete the order from the database
$sql = "DELETE FROM `order` WHERE order_id = $order_id";
$result = $conn->query($sql);

$response = array();
if ($result) {
    $response["success"] = true;
} else {
    $response["success"] = false;
}

// Close the database connection
$conn->close();

// Send the response back to the AJAX request
echo json_encode($response);
?>
