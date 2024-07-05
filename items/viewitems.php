<!DOCTYPE html>
<html>
<head>
<style>
.item-list {
      list-style-type: none;
      padding: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      grid-gap: 20px;
    }
.item-list li {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }
    
    .item-list li img {
      width: 150px;
      height: 150px;
      margin-bottom: 10px;
    }
    
    .item-list li .item-info {
      flex-grow: 1;
    }
    
    .item-list li .item-title {
      font-weight: bold;
    }
    
    .item-list li .item-price {
      color: #888;
    }
	
.trend {
	text-align: left;
}
</style>
    <title>View Items</title>
</head>
<body>
    <h1>View Items</h1>

    <?php
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "buymart");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get details from table
    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul class='item-list'>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<a href='viewanitem.php?item_id=" . $row['item_id'] . "'>";
            echo "<img src='item_photos/" . $row['photo'] . "' width='100'>";
            echo "<div class='item-info'>";
            echo "<h3 class='item-title'>" . $row['name'] . "</h3>";
            echo "<p class='item-description'>" . $row['description'] . "</p>";
            echo "<span class='item-price'>" . $row['price'] . "</span>";
            echo "</div>";
            echo "</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    } else {
        echo "<p>No items found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
