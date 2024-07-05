<html>
<head>
	<title>About Us</title>
	<link rel="stylesheet" href="../home page/style/style.css">
	<link rel="stylesheet" href="AboutUs.css">
	<script src="https://kit.fontawesome.com/24b485c31a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
	<style>
	h1 {
    color: #187d22;
    text-align: center;
	font-size:35px;
}
	body{
		background-color: #d5f0d7;
	}
	</style>
</head>
<body>

	<a href="#" ><img src="../home page/img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="loggedhome.php" >Home</a>
			<a href="aboutusn1.php"  class="active">About us</a>
			<a href="contactus.php">Contact us</a>
			<a href="qna.php">FAQ</a>
			<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: homepage.html");
    exit();
}

// Display a welcome message with the username
echo "<span class='hello'>";
echo "Hello, " . $_SESSION['username'];
echo "</span>";
?>
	<img src="../home page/img/giphy.gif" id='hello'></div>
		
		
	</div>
	<div class="sublog">
		<button id="log"><a href="../home page/logout.php">logout</a></button>
		
		<a href="myacc.php"><img src="../home page/img/account.png" class="acc"></a>
	</div>
	
	<h1>Our Team</h1><br/>
			<div class="team">
				<!--person 1-->
				
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="../home page/img/tharindu.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Tharindu Sandeepa</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				
				<!--person 2-->
				
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="../home page/img/vihara1.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Vihara Diwyanjalee</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
			
				<!--person 3-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="../home page/img/nisad.jpg" alt="person1"style="width: 180px; height: 250px;">
						</div>
						<div class="contentBx">
							<h4>Nisadi Mithara</h4>
							<h5>Director General</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://instagram.com/_nimi208_?igshid=NGExMmI2YTkyZg=="><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				
				<!--person 4-->
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="../home page/img/maneesha.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Maneesha Kavindie</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				
				<!--person 5-->
				
				<div class="card">
					<div class="content">
						<div class="image">
							<img src="../home page/img/pasindu.jpg" alt="person1">
						</div>
						<div class="contentBx">
							<h4>Pasindu Rasanjaya</h4>
							<h5>Director</h5>
						</div>
						<div class="scm">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
			
		<br>
	

	<footer class="footer">
    <div class="footer-logo">
      <a href="../admin/itemdata.php"><img src="img/logo.png" alt="Logo"><a/>
    </div>
	<p id="copyr">©BuyMart.inc 2023</p>
    <div class="social-media">
      <a href="https://www.facebook.com/example"><img src="img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/example"><img src="img/twitter.png" alt="Twitter"></a>
      <a href="https://www.instagram.com/example"><img src="img/instagram.png" alt="Instagram"></a>
    </div>
  </footer>
</body>
</html>