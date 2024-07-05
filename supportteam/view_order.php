<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>View Order</title>
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
            color: white;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
			 box-shadow: 0 0 20px rgba(0, 0, 0, 1);
			 background-color: white;
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
        <h1>Order Details</h1>

        <?php
        // Check if the order ID is provided in the query string
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

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

            // Retrieve the order data from the database based on the order ID
            $sql = "SELECT * FROM `order` WHERE order_id = " . $orderId;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

               echo "<table>";
echo "<tr><th>Order ID</th><td>" . $row["order_id"] . "</td></tr>";
echo "<tr><th>Item ID</th><td>" . $row["item_id"] . "</td></tr>";
echo "<tr><th>Country</th><td>" . $row["country"] . "</td></tr>";
echo "<tr><th>Name</th><td>" . $row["name"] . "</td></tr>";
echo "<tr><th>Email</th><td>" . $row["email"] . "</td></tr>";
echo "<tr><th>Phone Number</th><td>" . $row["phone_number"] . "</td></tr>";
echo "<tr><th>Address Line 1</th><td>" . $row["address_line1"] . "</td></tr>";
echo "<tr><th>Street Name</th><td>" . $row["street_name"] . "</td></tr>";
echo "<tr><th>City</th><td>" . $row["city"] . "</td></tr>";
echo "<tr><th>Province</th><td>" . $row["province"] . "</td></tr>";
echo "<tr><th>Postal Code</th><td>" . $row["postal_code"] . "</td></tr>";
echo "<tr><th>Card Number</th><td>" . $row["card_number"] . "</td></tr>";
echo "<tr><th>Cardholder Name</th><td>" . $row["cardholder_name"] . "</td></tr>";
echo "<tr><th>Expiration</th><td>" . $row["expiration"] . "</td></tr>";
echo "<tr><th>CVV</th><td>" . $row["cvv"] . "</td></tr>";
echo "<tr><th>Date Ordered</th><td>" . $row["date_ordered"] . "</td></tr>";
echo "</table>";

            } else {
                echo "<p>No order found with the provided ID.</p>";
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "<p>Invalid order ID.</p>";
        }
        ?>
    </div>
</body>
</html>
