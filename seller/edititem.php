<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
       

        h1 {
			margin-top:8%;
            color: white;
            text-align: center;
			
        }

        form {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 0 auto;
            max-width: 500px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 1);
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
<body>



<div class="header">	 
	<div class="navbar">
		<a href="dashboard.php" >Dashboard</a>
		<a href="#">User accounts</a>
		<a href="#">Seller accounts</a>
		<a href="#">Admin Accounts</a>
		<a href="#" class="active" >Item list</a>
		<?php
            session_start();

            // Check if the user is logged in
            if (!isset($_SESSION['username'])) {
                header("Location: sellerlogin.html");
                exit();
            }

            // Display a welcome message with the username
            echo "<span class='hello'>";
            echo "Hello, Seller " . $_SESSION['username'];
            echo "</span>";
            ?>
	</div>
	
</div>

<div class="sublog">
	<button id="log"><a href="../home page/logout.php">logout</a></button>
	
</div>

<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $conn = mysqli_connect("localhost", 'root', '', 'buymart');
    
    if ($conn->connect_error) {
        die('Connection failed');
    }
    
    $sql = "SELECT name, description,price,category FROM item WHERE item_id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <html>
        <head>
            <link rel="stylesheet" href="style/style.css">
        </head>
        <body>
            <h1>Edit Item</h1>
            <form method="post" action="updateitem.php" enctype="multipart/form-data">
                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                <label for="new_name">Name:</label>
                <input type="text" name="new_name" value="<?php echo $row['name']; ?>"><br><br>
                <label for="new_description">Description:</label>
                <input type="text" name="new_description" value="<?php echo $row['description']; ?>"><br><br>
				 <label for="new_price">Price:</label>
                <input type="int" name="new_price" value="<?php echo $row['price']; ?>"><br><br>
			<label for="category">Selected Category: <?php echo $row['category']; ?></label>
		<select id="category" name="category" required >
			<option value="Electronics">Electronics</option>
			<option value="Fashion">Fashion</option>
			<option value="Health and Beauty">Health and Beauty</option>
			<option value="Sports">Sports</option>
			<option value="Trending">Trending</option>
		</select><br><br>
                <label for="new_photo">Photo:</label>
                <input type="file" name="new_photo" id="new_photo"><br><br>
				 <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" name="update" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Item not found.";
    }
    
    $conn->close();
}
?>
</body>
</html>