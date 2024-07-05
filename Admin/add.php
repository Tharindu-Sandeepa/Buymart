<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
   require_once 'config.php';

    // Prepare and execute SQL query to insert item data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category']; 
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
    $targetDirectory = "../items/item_photos/";  // Directory where the uploaded files will be stored
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
	header("Location: dashboard.php");
        exit();

    $stmt->close();
    $conn->close();
	
	
}
?>