<?php
// Retrieve the form data
if (
    isset($_POST['userName'], $_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['phoneNumber'], $_POST['password'], $_POST['image'])
) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $image = $_POST['image'];

    // Update the customer data in the database
    // Replace the database connection details with your own
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "buymart";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password before updating it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE customer SET email = '$email', first_name = '$firstName', last_name = '$lastName', phone_number = '$phoneNumber', password = '$hashedPassword', image = '$image' WHERE userName = '$userName'";

    if ($conn->query($sql) === TRUE) {
        echo "Customer data updated successfully.";
    } else {
        echo "Error updating customer data: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Required form fields are missing.";
}
?>
