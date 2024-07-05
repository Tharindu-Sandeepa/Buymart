<!DOCTYPE html>
<html>
<head>
    <title>Item Search</title>
</head>
<body>
    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Enter item name">
        <input type="submit" value="Search">
    </form>

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
///////////////////////////////////////////////////////////////////////////
        // Prepare the SQL query
        $query = "SELECT * FROM item WHERE name LIKE '%$searchTerm%'";

        // Execute the query
        $result = mysqli_query($connection, $query);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Display the search results
            echo "<h2>Search Results:</h2>";
             while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<img src='item_photos/" . $row['photo'] . "' width='100'>";
                echo "<div class='item-info'>";
                echo "<h3 class='item-title'>" . $row['name'] . "</h3>";
                echo "<p class='item-description'>" . $row['description'] . "</p>";
                echo "<span class='item-price'>" . $row['price'] . "</span>";
                echo "</div>";
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
</body>
</html>
