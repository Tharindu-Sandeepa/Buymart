<!DOCTYPE html>
<html>
<head>
    <title>Add admin</title>
    <style>
        body {
			
			background-image: url("img/back2.jpg");
			background-repeat: no-repeat;
			background-size: cover;

			font-family: Arial, sans-serif;
            
            color: #FFFFFF;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #222222;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .form-group input[type="submit"] {
            background-color: #008000;
            color: #FFFFFF;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    
    
    <form action="add_seller.php" method="POST">

       <div class="container">
    <h2>Add Seller</h2>
    <form action="add_seller.php" method="POST">
        <div class="form-group">
            <label for="bus_name">Business Name:</label>
            <input type="text" id="bus_name" name="bus_name" required>
        </div>
        <div class="form-group">
            <label for="bus_email">Business Email:</label>
            <input type="email" id="bus_email" name="bus_email" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Add Seller">
        </div>
    </form>
</div>

   

</body>
</html>
