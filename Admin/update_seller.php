<?php
// Retrieve the form data
if(isset($_POST['busName'], $_POST['busEmail'], $_POST['username'], $_POST['password'], $_POST['location'])) {
    $busName = $_POST['busName'];
    $busEmail = $_POST['busEmail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $location = $_POST['location'];

    require_once 'config.php';

    // Hash the password before updating it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE seller SET bus_name = '$busName', bus_email = '$busEmail', password = '$hashedPassword', location = '$location', username=' $username' WHERE username = '$username'";

    if ($conn->query($sql) === TRUE) {
       header("location:sellerdata.php");
    } else {
        echo "Error updating seller data: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Required form fields are missing.";
}
?>
