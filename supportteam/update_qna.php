<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the ID and updated values from the form
    $id = $_POST["id"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    // You can perform additional validation and sanitization if needed

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "Buymart");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the Q&A record in the database
    $sql = "UPDATE qna SET question = '$question', answer = '$answer' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("location:support.php");
    } else {
        echo "Error updating Q&A record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
