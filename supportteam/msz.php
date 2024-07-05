<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buymart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the "contactus" table
$sql = "SELECT * FROM contactus";
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Function to delete row
function deleteRow($conn, $contId) {
    $sql = "DELETE FROM contactus WHERE cont_id = $contId";
    if ($conn->query($sql) === TRUE) {
        echo "Row with cont_id: $contId has been deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Data</title>
	<link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("back3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px; /* Adjust the max-width value as desired */
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        th {
            background-color: #008000;
            color: #FFFFFF;
            padding: 10px;
            text-align: left;
        }

        td {
            background-color: #FFFFFF;
            color: #333333;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #F0F0F0;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
        }

        .action-buttons button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #008000;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
        }

        .action-buttons button:hover {
            background-color: #006400;
        }

        .message-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .message-modal-content {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
           <a href="dashboard.php" >Dashboard</a>
            <a href="support.php">Manage FAQ</a>
            <a href="msz.php" class="active">Messages</a>
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
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
           
            <th>Actions</th>
        </tr>

        <?php if (!empty($data)) : ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["subject"]; ?></td>
                    
                    <td class="action-buttons">
                        <button onclick="viewRow('<?php echo $row["message"]; ?>')">View</button>
                        <button onclick="deleteRow(<?php echo $row["cont_id"]; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">No data available</td>
            </tr>
        <?php endif; ?>
    </table>

    <div id="messageModal" class="message-modal">
        <div class="message-modal-content">
            <button onclick="closeModal()">Close</button>
            <p id="messageText"></p>
        </div>
    </div>

    <script>
        function viewRow(message) {
            document.getElementById("messageText").textContent = message;
            document.getElementById("messageModal").style.display = "flex";
        }

        function deleteRow(contId) {
            if (confirm("Are you sure you want to delete this row?")) {
                // Redirect to delete.php 
                window.location.href = "delete.php?cont_id=" + contId;
            }
        }

        function closeModal() {
            document.getElementById("messageModal").style.display = "none";
        }
    </script>
</body>
</html>
