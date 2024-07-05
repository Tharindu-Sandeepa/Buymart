<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/style.css">
  <title>Item Details - BuyMart</title>
  <style>
    body {
      background-color: #F1F1F1;
      font-family: Arial, sans-serif;
    }
    
    #container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #FFFFFF;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center; /* Add this line to center align the content */
}
    
    h1 {
      font-size: 24px;
      color: #333333;
      margin-bottom: 10px;
    }
    
    img {
      max-width: 100%;
      height: auto;
    }
    
    p {
      font-size: 16px;
      color: #555555;
    }
    
    .price {
      font-size: 20px;
      color: #27AE60;
      margin-top: 20px;
    }
    
    .buy-button {
	
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #27AE60;
      color: #FFFFFF;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    
    .buy-button:hover {
      background-color: #1E8449;
    }
  </style>
</head>
<body>
<a href="#" ><img src="img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="../home page/homepage.html" class="active" >Home</a>
			<a href="#" >About us</a>
			<a href="#">Trending items</a>
			<a href="../items/addnew.php">Sell</a>
			<a href="#">FAQ</a>
			
		</div>
		
	</div>
	<div class="sublog">
		<button id="log"><a href="../login page/web.html">Login</a></button>
		<button id="sub"><a href="#">Sign up</a></button>
		
	</div>

	
	<a href="#"><img src="img/account.png" class="acc"></a>
  <div id="container">
    <?php
      // Assuming you have already established a database connection
       $conn = new mysqli("localhost", "root", "", "buymart");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
      // Fetch item details from the database
      $item_id = $_GET['item_id']; // Assuming the item ID is passed in the URL parameter
      $query = "SELECT * FROM item WHERE item_id = $item_id";
      $result = mysqli_query($conn, $query);
      
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $item_name = $row['name'];
        $item_image = $row['photo'];
        $item_details = $row['description'];
        $item_price = $row['price'];
        
        // Display item details on the webpage
        echo '<h1>' . $item_name . '</h1>';
        echo "<img src='item_photos/" . $item_image . "' alt='" . $item_name . "' width='300'>";


        echo '<p>' . $item_details . '</p>';
        echo '<p class="price">$' . $item_price . '</p>';
        
        // Add a button to buy the item
        echo '<a href="buy.php?item_id=' . $item_id . '" class="buy-button">Buy Now</a>';
      } else {
        echo '<p>Item not found.</p>';
      }
      
      // Close the database connection
      mysqli_close($conn);
    ?>
  </div>
  <footer class="footer">
    <div class="footer-logo">
      <a href="http://localhost/buymart/Admin%20-%20Backend/Homepage.php"><img src="img/logo.png" alt="Logo"><a/>
    </div>
	<p id="copyr">©BuyMart.inc 2023</p>
    <div class="social-media">
      <a href="https://www.facebook.com/example"><img src="img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/example"><img src="img/twitter.png" alt="Twitter"></a>
      <a href="https://www.instagram.com/example"><img src="img/instagram.png" alt="Instagram"></a>
    </div>
  </footer>
</body>
</html>
