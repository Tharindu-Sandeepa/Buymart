<?php
// Retrieve the form data
if(isset($_POST['user_Id'], $_POST['userName'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['password'])) {
    $user_Id = $_POST['user_Id'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    require_once 'config.php';

    // Hash the password before updating it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE customer SET userName = '$userName', email = '$email', first_name = '$first_name', last_name = '$last_name', phone_number = '$phone_number', password = '$hashedPassword' WHERE user_Id = '$user_Id'";

    if ($conn->query($sql) === TRUE) {
        header("location:userdata.php");
    } else {
        echo "Error updating customer data: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Required form fields are missing.";
}
?>
