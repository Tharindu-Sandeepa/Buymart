<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="../home page/style/style.css">
	<style>
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
    body {
      font-family: Arial, sans-serif;
      background-color: #F0F8F7;
      color: #333;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #FFFFFF;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      color: #008000;
    }

    .container input[type="text"],
    .container input[type="email"],
    .container textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #DDDDDD;
    }

    .container input[type="submit"] {
      background-color: #008000;
      color: #FFFFFF;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    .container input[type="submit"]:hover {
      background-color: #006400;
    }
  </style>
</head>
<body>
<a href="#" ><img src="../home page/img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="loggedhome.php"  >Home</a>
			<a href="aboutusn1.php" >About us</a>
			<a href="contactus.php" class="active">Contact us</a>
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
	
  <div class="container">
    <h2>Contact Us</h2>
    <form action="submit_contact.php" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="text" name="phone" placeholder="Your Phone Number" required>
      <input type="text" name="subject" placeholder="Subject" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <input type="submit" value="Submit">
    </form>
  </div>
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
