<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Seller Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
        }
        
        form {
			box-shadow: 0 0 20px rgba(0, 0, 0, 1);
            max-width: 400px;
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="header">
        <div class="navbar">
            <a href="dashboard.php" >Dashboard</a>
            <a href="myitems.php" >My Items</a>
            <a href="selleracc.php" class="active">My account</a>
            <?php
            session_start();

            // Check if the user is logged in
            if (!isset($_SESSION['username'])) {
                header("Location: sellerlogin.html");
                exit();
            }

            // Display a welcome message with the username
            echo "<span class='hello'>";
            echo "Hello, Seller " . $_SESSION['username'];
            echo "</span>";
            ?>
        </div>
    </div>
    <div class="sublog">
        <button id="log"><a href="../home page/logout.php">logout</a></button>
    </div>

    <h1>My Account</h1>
    
    <?php
    // Retrieve the seller data from the database and pre-fill the form
    // Replace the database connection details with your own
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buymart";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Assuming you have a logged-in seller with a specific ID, you can fetch their data
    $sellerId = $_SESSION['username']; // Replace with the logged-in seller's ID or retrieve it from the session
    
    $sql = "SELECT * FROM seller WHERE username = '$sellerId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $busName = $row["bus_name"];
        $busEmail = $row["bus_email"];
        $username = $row["username"];
        $password = $row["password"];
        $location = $row["location"];
        
        // Display the form with the retrieved data
        ?>
        
        <form action="update_seller.php" method="post">
            <label for="busName">Business Name:</label>
            <input type="text" name="busName" value="<?php echo $busName; ?>"><br>
            
            <label for="busEmail">Business Email:</label>
            <input type="email" name="busEmail" value="<?php echo $busEmail; ?>"><br>
            
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>"><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>"><br>
            
            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo $location; ?>"><br>
            
            <input type="submit" value="Update">
        </form>
        
        <?php
    } else {
        echo "Seller data not found.";
    }
    
    $conn->close();
    ?>
    
</body>
</html>
