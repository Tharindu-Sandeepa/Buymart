<html>
<head>
	<link rel="stylesheet" href="style/style.css">
	<style>
	.buttons
	{
		display:flex;
		
	}
	
	.remove
	{
		background: red;
        color: white;
	}
	.update
	{
		background: blue;
        color: white;
	}
	.remove:hover
	{
		background: #ff4d4d;
        color: white;
	}
	.update:hover
	{
		background: #315cfd;
		
        color: white;
	}
	</style>
</head>
<body>



<div class="header">	 
	<div class="navbar">
		<a href="dashboard.php" >Dashboard</a>
			<a href="userdata.php">Customer accounts</a>
			<a href="sellerdata.php" class="active">Seller accounts</a>
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




<div class="usertable">
	<p>Seller accounts list</p>
	<table border="1" class="table1">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>Location</th>
			
			<th>Actions</th>
		</tr>
		<?php
		require_once 'config.php';
		$sql = "SELECT bus_name, bus_email,username,location,password FROM seller";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<tr>
						<td>".$row["bus_name"]."</td>
						<td>".$row["bus_email"]."</td>
						<td>".$row["username"]."</td>
						<td>".$row["location"]."</td>
						
						<td>
						<div class='buttons'>
							<form method='post' action='removeseller.php'>
								<input type='hidden' name='name' value='".$row["bus_name"]."'>
								<button type='submit' name='remove' class='remove'>Remove</button>
							</form>
							<form method='post' action='updateseller.php'>
								<input type='hidden' name='name' value='".$row["bus_name"]."'>
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