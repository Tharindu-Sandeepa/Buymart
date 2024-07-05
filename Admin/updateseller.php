<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/style.css">
    <title>Seller Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
			color:white;
			margin-left:30%;
        }
        
        form {
            max-width: 400px;
            margin-bottom: 20px;
			margin-left:30%;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
			color:white;
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

    <h1>Seller Account</h1>
    
    <?php
    require_once 'config.php';
    
    
    $sellerId = $_POST['name']; 
    
    $sql = "SELECT * FROM seller WHERE bus_name = '$sellerId'";
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
			
			<input type='hidden' name='id' value='".$row["seller_id"]."'>
            
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
