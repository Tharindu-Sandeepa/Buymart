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

// Prepare the SQL statement to insert the order data
$sql = "INSERT INTO `order` (item_id, country, name, email, phone_number, address_line1, street_name, city, province, postal_code, card_number, cardholder_name, expiration, cvv)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error in preparing the statement: " . $conn->error);
}

// Bind the form data to the prepared statement parameters
$itemId = $_POST['item_id'];
$country = $_POST['country'];
$name = $_POST['Name'];
$email = $_POST['email'];
$phone = $_POST['number'];
$addressLine1 = $_POST['adno'];
$streetName = $_POST['street'];
$city = $_POST['City'];
$province = $_POST['Province'];
$postalCode = $_POST['postal_code'];
$cardNumber = $_POST['card-number'];
$cardholderName = $_POST['card-holder'];
$expiration = $_POST['expiration'];
$cvv = $_POST['cvv'];

$stmt->bind_param(
    "isssssssssssss",
    $itemId,
    $country,
    $name,
    $email,
    $phone,
    $addressLine1,
    $streetName,
    $city,
    $province,
    $postalCode,
    $cardNumber,
    $cardholderName,
    $expiration,
    $cvv
);

// Execute the statement
if ($stmt->execute()) {
    // Order insertion successful
	
    echo '<script>alert("Order successful!!");</script>';
} else {
    // Order insertion failed
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
header("location:loggedhome.php");
exit();
?>
