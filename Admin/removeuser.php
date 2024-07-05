<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", 'root', '', 'buymart');

    if ($conn->connect_error) {
        die('Connection failed');
    }

    $seller = $_POST['name'];

    // Prepare and execute SQL query to remove the item from the item table
    $stmt = $conn->prepare("DELETE FROM customer WHERE user_Id = ?");
    $stmt->bind_param("s", $seller);

    if ($stmt->execute()) {
        // Item removal successful
        $stmt->close();
        $conn->close();
        header("Location: userdata.php");
        exit();
    } else {
        // Error occurred while removing the item
        echo '<script>alert("Error removing item.");</script>';
    }

    $stmt->close();
    $conn->close();
}
?>
