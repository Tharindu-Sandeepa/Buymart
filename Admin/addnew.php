<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
        body {
            background-image: url("img/back2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #008000;
            color: #FFFFFF;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #222222;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .form-group input[type="submit"] {
            background-color: #008000;
            color: #FFFFFF;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Item</h2>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
        
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="5" cols="40" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Health and Beauty">Health and Beauty</option>
                    <option value="Sports">Sports</option>
					<option value="Trending">Trending</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" required>
            </div>
            
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Add Item">
            </div>
        </form>
    </div>
</body>
</html>
