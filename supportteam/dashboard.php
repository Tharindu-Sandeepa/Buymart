<html>
<head>
    <link rel="stylesheet" href="style.css">
	<style>
	body
{
	background-image: url("back3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
 
  
}
.box{
	margin-left:6%;
	margin-right:6%;
    background-color: #23a649;
    border: none;
    border-radius: 10px;
    width: 300px;
    height: 210px;
    text-align: center;
    box-shadow: 0 0 20px rgba(0, 0, 0, 1);
    backdrop-filter: blur(10px) ;
    border: 1px solid rgba(255, 255, 255, 0.2);
}
hr{
    border: 3px;
}
.box h3{
    padding: 10px 20px;
	color:#fff;
}
.box h4{
    position: relative;
    vertical-align: middle;
    margin-top: 2;
    font-size: 72px;
	color:#fff;
}
.boxcontainer{
    margin-top: 1%;
    display: flex;
    justify-content: center;
}
	</style>
</head>
<body>
    <a href="#"><img src="../home page/img/logo.png" class="logo"></a>
    <div class="header">
        <div class="navbar">
            <a href="#" class="active">Dashboard</a>
            <a href="support.php">Manage FAQ</a>
            <a href="msz.php">Messages</a>
			<a href="order.php">Manage orders</a>
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
        <?php
	$conn=mysqli_connect("localhost",'root','','buymart');
	
	if(($conn->connect_error))
{
	die('connection faild');
}
?>
<div class="boxcontainer">
            <div class="box">
                <?php 
                    $sql = "SELECT * FROM qna";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>FAQ Count</h3>";
                    echo "<hr>";
                    echo "<h4>$result</h4>"
                ?>     
			</div>
			 <div class="box">
                <?php 
                    $sql = "SELECT * FROM contactus";
                    $result =mysqli_num_rows (mysqli_query($conn,$sql));
                    echo "<h3>Messages</h3>";
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
</div>
    </div>
</body>
</html>
