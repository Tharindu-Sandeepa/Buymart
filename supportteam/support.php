<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="style.css">
    <style>
        body
{
	background-image: url("back3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
 
  
}
       

        .container {
			
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

       

        .question {
            font-weight: bold;
            color: #5cb85c;
        }

        .answer {
            margin-bottom: 15px;
        }

        table {
			
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5cb85c;
            color: #fff;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .button {
            padding: 8px 12px;
            margin: 0 5px;
            background-color: #5cb85c;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
			margin-bottom:7px;
        }

        .button:hover {
            background-color: #4cae4c;
        }

        .button.delete {
            background-color: #d9534f;
        }

        .button.delete:hover {
            background-color: #c9302c;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
 <a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="dashboard.php" >Dashboard</a>
            <a href="support.php" class="active">Manage FAQ</a>
            <a href="msz.php">Messages</a>
			<a href="order.php">Manage orders</a>
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
    <div class="center">
        
    
    <div class="container">
        
        <div class="button-container">
            <button class="button" onclick="window.location.href='add_qna.php'">Add New Q&A</button>
        </div>

        <table >
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>

            <?php
            // Connect to the database
            $conn = new mysqli("localhost", "root", "", "Buymart");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch questions and answers from the database
            $sql = "SELECT id, question, answer FROM qna";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $question = $row["question"];
                    $answer = $row["answer"];

                    echo '<tr>';
                    echo '<td>' . $question . '</td>';
                    echo '<td>' . $answer . '</td>';
                    echo '<td class="button-container">';
                    echo '<form action="edit_qna.php" method="POST" style="display:inline">';
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                    echo '<button class="button" type="submit">Edit</button>';
                    echo '</form>';
                    echo '<form action="delete_qna.php" method="POST" style="display:inline">';
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                    echo '<button class="button delete" type="submit">Delete</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">No questions found.</td></tr>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>
</div>
        
    </div>
</body>
</html>
