<html>
<head>
	<link rel="stylesheet" href="style/style.css">
	
</head>
<body>

	<a href="#" ><img src="img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="dashboard.php" class="active">Dashboard</a>
			<a href="userdata.php">Customer accounts</a>
			<a href="sellerdata.php">Seller accounts</a>
			<a href="itemdata.php"  >Item list</a>
			<a href="admindata.php">Admin Accounts</a>
			<a href="supporddata.php">Support team</a>
			
			
			<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: adminlogin.html");
    exit();
}

// Display a welcome message with the username
echo "<span class='hello'>";
echo "Hello, Admin " . $_SESSION['name'];
echo "</span>";
?>
			
		</div>
		
	</div>
	
	<div class="sublog">
		<button id="log"><a href="../home page/logout.php">logout</a></button>
		
	</div>

	
	
	
	
<?php
	require_once 'config.php';
?>
<div class="boxcontainer">
            <div class="box">
                <?php 
                    $sql = "SELECT * FROM item";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Items</h3>";
					echo "	<form method='post' action='addnew.php'>
								<button type='submit' name='remove' class='itembtn'>Add Item</button>
							</form>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
			 <div class="box">
                <?php 
                    $sql = "SELECT * FROM customer";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Customer accounts</h3>";
					echo "	<form method='post' action='addcus.php'>
								<button type='submit' name='remove' class='itembtn'>Add User</button>
							</form>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
			<div class="box">
                <?php 
                    $sql = "SELECT * FROM supteam";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Support team</h3>";
					echo "	<form method='post' action='addsup.php'>
								<button type='submit' name='remove' class='itembtn'>Add New</button>
							</form>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
</div>
<div class="boxcontainer2">
			 <div class="box">
                <?php 
                    $sql = "SELECT * FROM seller";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Seller accounts</h3>";
					echo "	<form method='post' action='addsel.php'>
								<button type='submit' name='remove' class='itembtn'>Add Seller</button>
							</form>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
			 <div class="box">
                <?php 
                    $sql = "SELECT * FROM admin";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Admin Accounts</h3>";
					echo "	<form method='post' action='addaddmin.php'>
								<button type='submit' name='remove' class='itembtn'>Add New</button>
							</form>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
			<div class="box">
					<?php
					$sql = "SELECT * FROM `order`";
					$result = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($result);

					echo "<h3>Orders</h3>";
					echo "<hr>";
					echo "<h4>$count</h4>";
					?>
			</div>

	

	
</body>
</html>