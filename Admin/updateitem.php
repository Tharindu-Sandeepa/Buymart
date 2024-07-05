<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newName = $_POST['new_name'];
    $newDescription = $_POST['new_description'];
    $newPhoto = $_FILES['new_photo']['name'];
    $tempPhoto = $_FILES['new_photo']['tmp_name'];
	$newprice= $_POST['new_price'];
	$category=$_POST['category'];

    require_once 'config.php';

    // Update name and description
    $updateSql = "UPDATE item SET name='$newName', description='$newDescription',price='$newprice',category='$category' WHERE item_id='$id'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Item data updated successfully. ";
    } else {
        echo "Error updating item data: " . $conn->error;
    }

    // Update photo if a new photo is uploaded
    if ($newPhoto != '') {
        $uploadDirectory = 'images/'; // Specify the directory where you want to save the uploaded images
        $targetFile = $uploadDirectory . basename($newPhoto);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        // Check if the uploaded file is a valid image
        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imageFileType, $validExtensions)) {
            if (move_uploaded_file($tempPhoto, $targetFile)) {
                $updatePhotoSql = "UPDATE item SET photo='$newPhoto' WHERE item_id='$id'";
                if ($conn->query($updatePhotoSql) === TRUE) {
                    echo "Item photo updated successfully.";
                } else {
                    echo "Error updating item photo: " . $conn->error;
                }
            } else {
                echo "Error uploading the photo.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF images are allowed.";
        }
    }
header("Location: itemdata.php");
        exit();
    $conn->close();
}
?>
