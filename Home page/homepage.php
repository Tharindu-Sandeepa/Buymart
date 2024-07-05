<html>
<head>
	<link rel="stylesheet" href="style/style.css">
	<style>
	
  a {
    text-decoration: none;
  }
</style>
</head>
<body>

	<a href="#" ><img src="img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="homepage.php" class="active" >Home</a>
			<a href="Aboutusn1.php" >About us</a>
			<a href="qna.php">FAQ</a>
			<img src="img/giphy.gif" id='hello'>
			
			
			
		</div>
		
		
	</div>
	<div class="sublog">
		<button id="log"><a href="loginform.html">Login</a></button>
		<button id="sub"><a href="../Account/customerAcc.php">Sign up</a></button>
		
	</div>

	
	<a href="#"><img src="img/account.png" class="acc"></a>
	
	<form method="GET" action="../items/finditem.php" >
	<div class="search-container">
	
	<input type="text" name="search" placeholder="Search..." class="search-input">
	<button type="submit" class="search-button">Search</button>
	</div>
	<img src="img/bbb.gif" class="bird">
	
	
	<form>

	<div class="header2">
		<div class="navbar2">
			<a href="homepage.php" class="active" >Home</a>
			<a href="electronics.php" >Electronics</a>
			<a href="fashion.php">Fashion</a>
			<a href="hb.php">Health & Beauty</a>
			<a href="sports.php">Sports</a>
		</div>

	</div>
	<div class="slideshow">
	
    <img src="img/dara.png" alt="Image 1" id="aa">
    <img src="img/dara2.png" alt="Image 2" id="aa">
	<img src="img/dara4.png" alt="Image 3" id="aa">
    <img src="img/dara3.png" alt="Image 4" id="aa">
	<img src="img/dara6.png" alt="Image 5" id="aa">
	
    </div>
	
	
	
<script>
    document.addEventListener("DOMContentLoaded", function() {
      var images = document.querySelectorAll('.slideshow img');
      var currentIndex = 0;

      function showNextImage() {
        // Hide current image
        images[currentIndex].style.display = 'none';

        // Increment index
        currentIndex = (currentIndex + 1) % images.length;

        // Display next image
        images[currentIndex].style.display = 'block';
      }

      setInterval(showNextImage, 4000);
    });
  </script>
  
  <p class="trend">Trending items <img src="img/fire.gif" id='fire'></p>
  
  <?php
    require_once 'config.php';

    // get details from table
    $sql = "SELECT * FROM item WHERE category='Trending'";
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