<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
	
	<link rel="stylesheet" href="style.css">
    
	
</head>
<body>

	
	<div class="header">	 
		<div class="navbar">
			<a href="#" class="active" >Dashboard</a>
			<a href="#" >My Items</a>
			<a href="#">My account</a>
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
			
	</div>
	</div>
		
	</div>
	

	
	
	
    
    <form action="additem.php" method="post" enctype="multipart/form-data" id="itemadd">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" cols="40" required></textarea><br><br>
		
		<label for="category">Category:</label>
		<select id="category" name="category" required>
			<option value="Electronics">Electronics</option>
			<option value="Fashion">Fashion</option>
			<option value="Health and Beauty">Health and Beauty</option>
			<option value="Sports">Sports</option>
			<option value="Trending">Trending</option>
		</select><br><br>
        
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required><br><br>
        
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" required><br><br>
        
        <input type="submit" value="Add Item">
    </form>

    <?php
	
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "buymart");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert item data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $category = $_POST['category']; // Check if 'category' key is set
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];
	$seller_id = $_SESSION['seller_id'];


    $stmt = $conn->prepare("INSERT INTO item (name, description, category, price, photo,seller_id) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssss", $name, $description, $category, $price, $photo,$seller_id);

    if ($stmt->execute()) 
    {
        echo '<script>alert("Item added successfully.");</script>';
    } 
    else 
    {
        echo '<p class="error">Error adding item: ' . $stmt->error . '</p>';
    }

    // Move the uploaded file to the desired directory
    $targetDirectory = "../items/item_photos/";  // Directory where the uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
    $uploadOk = move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

    if ($uploadOk) 
    {
        // File upload successful
        $photoPath = $targetFile; 
		// Store the file path in a variable or use it directly in the database query
		
    } 
    else 
    {
        // File upload failed
        echo '<p class="error">Sorry, there was an error uploading your file.</p>';
    }
header("Location: dashboard.php");
    $stmt->close();
    $conn->close();
}
?>



</body>
</html>
