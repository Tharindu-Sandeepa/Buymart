<html>
<head>
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
	</style>
</head>
<body>

	<a href="#" ><img src="../home page/img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="loggedhome.php" class="active" >Home</a>
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
	
	<form method="GET" action="../items/finditem.php" >
	<div class="search-container">
	
	<input type="text" name="search" placeholder="Search..." class="search-input">
	<button type="submit" class="search-button">Search</button>
	
	</div>
	<img src="../home page/img/bbb.gif" class="bird">
	<form>

	<div class="header2">
		<div class="navbar2">
			<a href="loggedhome.php"  >Home</a>
			<a href="electronics.php" >Electronics</a>
			<a href="fashion.php">Fashion</a>
			<a href="health.php">Health & Beauty</a>
			<a href="sports.php" class="active">Sports</a>
		</div>

	</div>
	
	
	
	
  
  <?php
    // Connect to MySQL database
    
    $conn = new mysqli("localhost", "root", "", "buymart");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get details from table
    $sql = "SELECT * FROM item WHERE category='Sports'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
	{
        echo "<ul class='item-list'>";
        
        
        while ($row = $result->fetch_assoc()) 
		{
            
			echo "<li>";
            echo "<a href='viewanitem.php?item_id=" . $row['item_id'] . "'>";
            echo "<img src='../items/item_photos/" . $row['photo'] . "' width='100'>";
            echo "<div class='item-info'>";
            echo "<h3 class='item-title'>" . $row['name'] . "</h3>";
            
            echo "<span class='item-price'>" . $row['price'] . "</span>";
            echo "</div>";
            echo "</a>";
            echo "</li>";
			
	
        }
        
        echo "</ul>";
    } 
	else 
	{
        echo "<p>No items found.</p>";
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