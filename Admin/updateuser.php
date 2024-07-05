<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
			margin-left:30%;
			color:white;
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

    <h1>Customer Account</h1>
    
    <?php
    require_once 'config.php';
    
   
    $user = $_POST['name']; 
    
    $sql = "SELECT * FROM customer WHERE user_Id = '$user'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row["userName"];
        $email = $row["email"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $phone_number = $row["phone_number"];
        $password = $row["password"];

        // Display the form with the retrieved data
        ?>
        
        <form action="update_customer.php" method="post">
            <label for="userName">Username:</label>
            <input type="text" name="userName" value="<?php echo $userName; ?>"><br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
            
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
            
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo $phone_number; ?>"><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>"><br>
			
			<input type='hidden' name='user_Id' value='<?php echo $row["user_Id"]; ?>'>
            
            <input type="submit" value="Update">
        </form>
        
        <?php
    } else {
        echo "Customer data not found.";
    }
    
    $conn->close();
    ?>
    
</body>
</html>
