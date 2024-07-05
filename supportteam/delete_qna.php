<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the ID of the Q&A record from the form
    $id = $_POST["id"];

    // You can perform additional validation and sanitization if needed

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "Buymart");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the Q&A record from the database
    $sql = "DELETE FROM qna WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("location:support.php");
    } else {
        echo "Error deleting Q&A record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
