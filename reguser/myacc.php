<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../home page/style/style.css">
    <title>Customer Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
			margin-left:30%;
        }
        
        form {
			box-shadow: 0 0 20px rgba(0, 0, 0, 1);
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
		a {
    text-decoration: none;
  }
	.hello
	{
	margin-left:14px;
	 font-family: cursive;
	font-size: 15px;
	color:green;
	}
    </style>
</head>
<body>
<a href="#" ><img src="../home page/img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="loggedhome.php"  >Home</a>
			<a href="aboutusn1.php" >About us</a>
			<a href="contactus.php">Contact us</a>
			<a href="qna.php">FAQ</a>
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
	<img src="../home page/img/giphy.gif" id='hello'></div>
		
		
	</div>
	<div class="sublog">
		<button id="log"><a href="../home page/logout.php">logout</a></button>
		
		
	</div>
	<a href="myacc.php"><img src="../home page/img/account.png" class="acc"></a>

    <h1>My Account</h1>
    
    <?php
    // Retrieve the customer data from the database and pre-fill the form
    // Replace the database connection details with your own
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buymart";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Assuming you have a logged-in customer with a specific ID, you can fetch their data
    $customerId = $_SESSION['username']; // Replace with the logged-in customer's ID or retrieve it from the session
    
    $sql = "SELECT * FROM customer WHERE userName = '$customerId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row["userName"];
        $email = $row["email"];
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $phoneNumber = $row["phone_number"];
        $password = $row["password"];
        $image = $row["image"];
        
        // Display the form with the retrieved data
        ?>
        
        <form action="update_customer.php" method="post">
            <label for="userName">Username:</label>
            <input type="text" name="userName" value="<?php echo $userName; ?>"><br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br>
            
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $lastName; ?>"><br>
            
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" name="phoneNumber" value="<?php echo $phoneNumber; ?>"><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>"><br>
           
            
            <input type="submit" value="Update">
        </form>
     
        <?php
    } else {
        echo "Customer data not found.";
    }
    
    $conn->close();
    ?>
    <footer class="footer">
    <div class="footer-logo">
      <a href="http://localhost/buymart/Admin%20-%20Backend/Homepage.php"><img src="../home page/img/logo.png" alt="Logo"><a/>
    </div>
	<p id="copyr">©BuyMart.inc 2023</p>
    <div class="social-media">
      <a href="https://www.facebook.com/example"><img src="../home page/img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/example"><img src="../home page/img/twitter.png" alt="Twitter"></a>
      <a href="https://www.instagram.com/example"><img src="../home page/img/instagram.png" alt="Instagram"></a>
    </div>
  </footer>
</body>
</html>
