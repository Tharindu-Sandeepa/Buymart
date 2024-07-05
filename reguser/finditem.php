<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../home page/style/style.css">
<style>
a {
    text-decoration: none;
  }
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.item-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.item-list li {
    display: flex;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    padding: 10px;
}

.item-list li img {
    width: 150px;
    height: 150px;
    margin-right: 20px;
}

.item-list li .item-info {
    flex-grow: 1;
}

.item-list li .item-title {
    font-weight: bold;
    font-size: 18px;
    margin: 0;
    margin-bottom: 5px;
}

.item-list li .item-description {
    margin: 0;
    color: #888;
}

.item-list li .item-price {
    color: #06c;
    font-size: 20px;
    margin: 0;
}

.trend {
    text-align: left;
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
	
	<form method="GET" action="finditem.php" >
	<div class="search-container">
	
	<input type="text" name="search" placeholder="Search..." class="search-input">
	<button type="submit" class="search-button">Search</button>
	</div>
	<img src="../home page/img/bbb.gif" class="bird">
	
	
	<form>
    <div class="container">
        

        <?php
        // Check if a search term is provided
        if (isset($_GET['search'])) {
            // Get the search term from the form
            $searchTerm = $_GET['search'];

            // Connect to the database
            $connection = mysqli_connect("localhost", "root", "", "buymart");

            // Check the database connection
            if (!$connection) {
                die("Database connection failed: " . mysqli_connect_error());
            }
            ///////////////////////////////////////////////////////////////////////
            // Prepare the SQL query
            $query = "SELECT * FROM item WHERE name LIKE '%$searchTerm%'";

            // Execute the query
            $result = mysqli_query($connection, $query);

            // Check if any rows are returned
            if (mysqli_num_rows($result) > 0) {
                // Display the search results
                echo "<h2>Search Results:</h2>";
                echo "<ul class='item-list'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>";
            echo "<a href='../items/viewanitem.php?item_id=" . $row['item_id'] . "'>";
            echo "<img src='../items/item_photos/" . $row['photo'] . "' width='100'>";
            echo "<div class='item-info'>";
            echo "<h3 class='item-title'>" . $row['name'] . "</h3>";
            
            echo "<span class='item-price'>" . $row['price'] . "</span>";
            echo "</div>";
            echo "</a>";
            echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "No matching items found.";
            }

            // Close the database connection
            mysqli_close($connection);
        }
        ?>
    </div>

</body>
</html>
