<html>
<head>
	<link rel="stylesheet" href="style/style.css">
	<style>
        body {
            background-color: #e9f3e9;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

       .header4 {
            background-color: #5cb85c;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .question {
            font-weight: bold;
            margin-bottom: 5px;
            color: #5cb85c;
        }

        .answer {
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

	<a href="#" ><img src="img/logo.png" class="logo"></a>
	
	<div class="header">	 
		<div class="navbar">
			<a href="#" class="active" >Home</a>
			<a href="#" >About us</a>
			<a href="#">Trending items</a>
			<a href="../items/addnew.php">Sell</a>
			<a href="qna.php">FAQ</a>
			
			
		</div>
		
		
	</div>
	<div class="sublog">
		<button id="log"><a href="loginform.html">Login</a></button>
		<button id="sub"><a href="sign.html">Sign up</a></button>
		
	</div>

	
	<a href="#"><img src="img/account.png" class="acc"></a>
	
	<div class="container">
        <div class="header4">
            <h1>FAQ</h1>
        </div>

        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "Buymart");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch questions and answers from the database
        $sql = "SELECT question, answer FROM qna";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $question = $row["question"];
                $answer = $row["answer"];

                echo '<div class="question">' . $question . '</div>';
                echo '<div class="answer">' . $answer . '</div>';
            }
        } else {
            echo "No questions found.";
        }

        // Close the database connection
        $conn->close();
        ?>

        
    </div>

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