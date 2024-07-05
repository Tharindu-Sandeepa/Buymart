<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", 'root', '', 'buymart');

    if ($conn->connect_error) {
        die('Connection failed');
    }

    $id = $_POST['name'];

    // Prepare and execute SQL query to remove the item from the item table
    $stmt = $conn->prepare("DELETE FROM admin WHERE admin_id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Item removal successful
        $stmt->close();
        $conn->close();
        header("Location: admindata.php");
        exit();
    } else {
        // Error occurred while removing the item
        echo '<script>alert("Error removing item.");</script>';
    }

    $stmt->close();
    $conn->close();
}
?>
