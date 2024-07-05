<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
	
	.header
{
	font-family:'Poppins',sans-serif;
	position:fixed;
	top:-5px;
	left:1PX;
	width:100%;
	padding:20px 10%;
	display:flex;
	justify-content:space-between;
	align-items:center; 
	display: inline-block;
	background-color: #f2f2f2;
	padding: 3px;
	margin-top:5px;
	
	
}
.logo 
{
	margin-top:16px;
	width: 100px;
    height: 100px;
	cursor:pointer;
}
.navbar
{
	display: inline-block;
	background-color: #f2f2f2;
	padding: 3px;
	border-radius: 14px;
}
.navbar a
{
	font-size:15px;
	color:#01d27a;
	text-decoration:none;
	font-weight:500;
	margin-left:35px;
	transition:.4s;
}
.navbar a:hover,
.navbar a.active
{
	color:#008000;
}
.sublog 
{

  position: fixed;
  top: 6px;
  right: 40px;	
}
.acc
{
	position: fixed;
	top: 1px;
    right: 5px;	
	width: 30px;
    height: 30px;
}
#log
{
	font-family:'Poppins',sans-serif;
	background-color: #00cc00;
	color:white;
	border-radius: 10px;
    cursor: pointer;
	border: none;
}
#log a,#sub a
{
	text-decoration: none;
	color:white;
 
}
#sub
{
	background-color: #00cc00;
	color:white;
	border-radius: 10px;
    cursor: pointer;
	border: none;
}


        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin: 0 auto;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="number"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
		
		
    
	
	</style>
	
</head>
<body>
<a href="#" ><img src="img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="../Home page/homepage.html"  >Home</a>
			<a href="#" >About us</a>
			<a href="#">Trending items</a>
			<a href="../items/addnew.php" class="active">Sell</a>
			<a href="#">FAQ</a>
			
		</div>
		
	</div>
	<div class="sublog">
		<button id="log"><a href="../login page/web.html">Login</a></button>
		<button id="sub"><a href="#">Sign up</a></button>
		
	</div>

	
	<a href="#"><img src="img/account.png" class="acc"></a>
	
    <h1>Add Item</h1>
    <form action="addnew.php" method="post" enctype="multipart/form-data">
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

    $stmt = $conn->prepare("INSERT INTO item (name, description, category, price, photo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $description, $category, $price, $photo);

    if ($stmt->execute()) 
    {
        echo '<script>alert("Item added successfully.");</script>';
    } 
    else 
    {
        echo '<p class="error">Error adding item: ' . $stmt->error . '</p>';
    }

    // Move the uploaded file to the desired directory
    $targetDirectory = "item_photos/";  // Directory where the uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
    $uploadOk = move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

    if ($uploadOk) 
    {
        // File upload successful
        $photoPath = $targetFile;  // Store the file path in a variable or use it directly in the database query
    } 
    else 
    {
        // File upload failed
        echo '<p class="error">Sorry, there was an error uploading your file.</p>';
    }

    $stmt->close();
    $conn->close();
}
?>



</body>
</html>
