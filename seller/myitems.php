<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
	
        .buttons {
            display: flex;
        }
        
        .remove {
            background: red;
            color: white;
        }
        
        .update {
            background: blue;
            color: white;
        }
        
        .remove:hover {
            background: #ff4d4d;
            color: white;
        }
        
        .update:hover {
            background: #315cfd;
            color: white;
        }
        
        .usertable {
            margin-top: 7%;
            text-align: center;
            color: black;
        }
        
        .table1 {
            box-shadow: 0 0 20px rgba(0, 0, 0, 1);
            width: 75%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 70px;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            color: black;
            background-color: white;
        }
        
        .table1 th,
        .table1 td {
            align-items: center;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        
        .table1 th {
            background-color: #00cc66;
            text-align: center;
			color:white;
        }
        
        .itembtn {
            background: #00ff00;
            color: black;
            height: 25px;
            cursor: pointer;
            border: none;
            border-radius: 7px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 1);
        }
        
        .itembtn:hover {
            background: red;
            color: white;
        }
        
        #log {
            left: 5;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="navbar">
            <a href="dashboard.php" >Dashboard</a>
            <a href="myitems.php" class="active">My Items</a>
            <a href="selleracc.php">My account</a>
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
    <div class="usertable">
        <h2>My item List</h2>
        <table border="1" class="table1">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", 'root', '', 'buymart');

            if ($conn->connect_error) {
                die('connection failed');
            }

            $seller_id = $_SESSION['seller_id'];

           $sql = "SELECT item_id, name, description, category, price FROM item WHERE seller_id='$seller_id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["name"]."</td>
                            <td>".$row["description"]."</td>
                            <td>".$row["category"]."</td>
                            <td>$".$row["price"]."</td>
                            <td>
                            <div class='buttons'>
                                <form method='post' action='removeitem.php'>
                                    <input type='hidden' name='id' value='".$row["item_id"]."'>
                                    <button type='submit' name='remove' class='remove'>Remove</button>
                                </form>
                                <form method='post' action='edititem.php'>
                                    <input type='hidden' name='id' value='".$row["item_id"]."'>
                                    <button type='submit' name='edit' class='update'>Edit</button>
                                </form>
                            </div>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No items found.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
