<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="#" class="active">Dashboard</a>
            <a href="myitems.php">My Items</a>
            <a href="selleracc.php">My account</a>
            <?php
            session_start();

            // Check if the user is logged in
            if (!isset($_SESSION['username'])) {
                header("Location: homepage.html");
                exit();
            }

            // Display a welcome message with the username
            echo "<span class='hello'>";
           echo "Hello, Seller " . $_SESSION['username'];
            echo "</span>";
            ?>
            <img src="../home page/img/giphy.gif" id='hello'>
        </div>
    </div>
    <div class="sublog">
        <button id="log"><a href="../home page/logout.php">logout</a></button>
    </div>
    <div class="center">
        <button class='itembtn'><a href="additem.php">Add Item</a></button>
        <div class="boxcontainer">
            <div class="box">
                <?php
                $conn = mysqli_connect("localhost", 'root', '', 'buymart');
                if ($conn->connect_error) {
                    die('Connection failed');
                }

                $sellerId = $_SESSION['seller_id']; // Retrieve the seller ID from the session

                $sql = "SELECT * FROM item WHERE seller_id = '$sellerId'";
                $result = mysqli_query($conn, $sql);
                $numRows = mysqli_num_rows($result);

                echo "<h3>My Items</h3>";
                echo "<hr>";
                echo "<h4>$numRows</h4>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>
