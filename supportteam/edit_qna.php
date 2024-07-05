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

    // Retrieve the existing question and answer for the specified ID
    $sql = "SELECT question, answer FROM qna WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        $answer = $row["answer"];
    } else {
        echo "No Q&A record found for the specified ID.";
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Edit Q&A</title>
    <style>
        body {
            background-color: #e9f3e9;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

      
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            padding: 8px 12px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="#" >Dashboard</a>
            <a href="support.php" class="active">Manage FAQ</a>
            <a href="selleracc.php">Messages</a>
            
            <img src="../home page/img/giphy.gif" id='hello'>
        </div>
    </div>
    <div class="sublog">
        <button id="log"><a href="../home page/logout.php">logout</a></button>
    </div>
    <div class="container">
        

        <form action="update_qna.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" name="question" id="question" value="<?php echo $question; ?>">
            </div>

            <div class="form-group">
                <label for="answer">Answer:</label>
                <input type="text" name="answer" id="answer" value="<?php echo $answer; ?>">
            </div>

            <div class="button-container">
                <button class="button" type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
