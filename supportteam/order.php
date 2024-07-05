<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Order Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
			background-image: url("back3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
            
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: green;
            text-align: center;
			
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
			background-color:white;
			box-shadow: 0 0 20px rgba(0, 0, 0, 1);
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #008000;
            color: #fff;
        }

        .view-btn,
        .delete-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .view-btn {
            background-color: #008000;
            color: #fff;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #ff0000;
            color: #fff;
        }
    </style>
</head>
<body>
<a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="dashboard.php" >Dashboard</a>
            <a href="support.php">Manage FAQ</a>
            <a href="msz.php">Messages</a>
			<a href="order.php" class="active">Manage orders</a>
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
        <h1>Order Management</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item ID</th>
                    <th>Country</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish a database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "buymart";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve the order data from the database
                $sql = "SELECT * FROM `order`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["item_id"] . "</td>";
                        echo "<td>" . $row["country"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>";
                        echo "<button class='view-btn' onclick='viewOrder(" . $row["order_id"] . ")'>View</button>";
                        echo "<button class='delete-btn' onclick='deleteOrder(" . $row["order_id"] . ")'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found.</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function viewOrder(orderId) {
            // Perform actions for viewing the order with the given order ID
            // For example, redirect to a new page or display a modal with order details
            window.location.href = "view_order.php?order_id=" + orderId;
        }

        function deleteOrder(orderId) {
            // Perform actions for deleting the order with the given order ID
            // For example, show a confirmation dialog and make an AJAX request to delete the order
            console.log("Delete Order: " + orderId);

            // Send an AJAX request to delete the order
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_order.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Handle the response from the server
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Reload the page to update the order list
                        location.reload();
                    } else {
                        alert("Failed to delete the order. Please try again.");
                    }
                }
            };
            xhr.send("order_id=" + orderId);
        }
    </script>
</body>
</html>
