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
			<a href="userdata.php" class="active">Customer accounts</a>
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




<div class="usertable">
	<p>Customer accounts list</p>
	<table border="1" class="table1">
		<tr>
			<th>User name</th>
			<th>Email</th>
			<th>First Name</th>
			<th>last Name</th>
			<th>Phone number</th>
			
			<th>Actions</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost", 'root', '', 'buymart');

		if ($conn->connect_error) {
			die('connection failed');
		}

		$sql = "SELECT userName,user_Id, email,first_name,last_name,phone_number,password FROM customer";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<tr>
						<td>".$row["userName"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["first_name"]."</td>
						<td>".$row["last_name"]."</td>
						<td>".$row["phone_number"]."</td>
						
						<td>
						<div class='buttons'>
							<form method='post' action='removeuser.php'>
								<input type='hidden' name='name' value='".$row["user_Id"]."'>
								<button type='submit' name='remove' class='remove'>Remove</button>
							</form>
							<form method='post' action='updateuser.php'>
								<input type='hidden' name='name' value='".$row["user_Id"]."'>
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