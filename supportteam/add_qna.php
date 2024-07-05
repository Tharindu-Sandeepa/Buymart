<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="style.css">
    <style>
        
        body {
            background-color: #e9f3e9;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #35b457;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #35b457;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #35b457;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #35b457;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2e9e4e;
        }
    </style>
</head>
<body>
<a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="dashboard.php" >Dashboard</a>
            <a href="support.php" class="active">Manage FAQ</a>
            <a href="selleracc.php">Messages</a>
			<?php
            session_start();

            // Check if the user is logged in
            if (!isset($_SESSION['username'])) {
                header("Location: homepage.html");
                exit();
            }

            // Display a welcome message with the username
            echo "<span class='hello'>";
           echo "Hello, " . $_SESSION['username'];
            echo "</span>";
            ?>
            
            <img src="../home page/img/giphy.gif" id='hello'>
        </div>
    </div>
    <div class="sublog">
        <button id="log"><a href="../home page/logout.php">logout</a></button>
    </div>
    <div class="container">
        <h2>Add Q&A</h2>

        <form action="add_qna.php" method="POST">
            <div>
                <label for="question">Question:</label>
                <input type="text" name="question" id="question">
            </div>

            <div>
                <label for="answer">Answer:</label>
                <input type="text" name="answer" id="answer">
            </div>

            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the values from the form
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    // You can perform additional validation and sanitization if needed

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "Buymart");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new Q&A record into the database
    $sql = "INSERT INTO qna (question, answer) VALUES ('$question', '$answer')";
    if ($conn->query($sql) === TRUE) {
       header("location:support.php");
    } else {
        echo "Error adding new Q&A record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    
    exit;
}
?>
