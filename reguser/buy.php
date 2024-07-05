<!DOCTYPE HTML>
<html>
<head>
    <title>Checkout</title>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="checkout.css">
	<link rel="stylesheet" href="../home page/style/style.css">
	<style>
	a {
    text-decoration: none;
  }
	.hello
	{
	margin-left:14px;
	 font-family: cursive;
	font-size: 15px;
	color:green;
	}
	.btn
	{
	
		margin-left:46%;
	}
	</style>
</head>
<body>

	
	<div class="header">	 
		<div class="navbar">
			<a href="loggedhome.php" class="active" >Home</a>
			<a href="aboutusn1.php" >About us</a>
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
		
		
	</div>

	
	<a href="#"><img src="../home page/img/account.png" class="acc"></a>
	
	
  <div id="container">

<h3>Place Your Order</h3>

<div class="form-container">
    <form action="order.php" method="POST">
      <div class="flex">
        <div class="inputBox">
          <label>Country:</label>
          <select name="country" class="box" required>
            <option value="">Select a country</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="China">United China</option>
            <option value="Australia">Australia</option>
            <option value="Japan">Japan</option>
            <option value="South korea">South Korea</option>
            <option value="India">India</option>
            <option value="Brazil">Brazil</option>
            <option value="Germany">Germany</option>
            <option value="Turkey">Turkey</option>
            <option value="Rassia">Rassia</option>
            <option value="Italy">Italy</option>
            <option value="Canada">Canada</option>
            <option value="South Africa">South Africa</option>
            <option value="Argantina">Argantina</option>
          </select>
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <label>Your Name:</label>
          <input type="text" name="Name" placeholder="Enter Your Name" class="box" maxlength="20" required>
        </div>
        <div class="inputBox">
          <label>Your Email:</label>
          <input type="email" name="email" placeholder="Enter your email" class="box" maxlength="50" required>
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <label>Phone Number:</label>
          <input type="tel" name="number" id="phone-input" placeholder="Enter your mobile number" class="box" maxlength="10" required>
          <span id="phone-error" class="error-message"></span>
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <label>Address Line 1:</label>
          <input type="text" name="adno" placeholder="e.g. address number" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <label>Street Name:</label>
          <input type="text" name="street" placeholder="e.g. street name" class="box" maxlength="50" required>
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <label>City:</label>
          <input type="text" name="City" placeholder="Enter your City" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <label>Province:</label>
          <input type="text" name="Province" placeholder="e.g. Western" class="box" maxlength="50" required>
        </div>
        
        <div class="flex">
          <div class="inputBox">
            <label>Postal Code:</label>
            <input type="text" name="postal_code" placeholder="e.g. 12345" pattern="\d{5}" maxlength="5" required>
          </div>
        </div>
      </div>
      <div class="inputIcon">
              <i class="fas fa-credit-card"></i>  </div>
            <label for="card-number">Card Number:</label>
              <input type="text" id="card-number" name="card-number" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" maxlength="19" required oninput="formatCardNumber(event)">

            <br/><br/>
            <div class="flex">
              <div class="inputBox">
                <label for="card-holder">Cardholder Name:</label>
                <input type="text" id="card-holder" name="card-holder" maxlength="50" required>
              </div>
              <div class="inputBox">
                <label for="expiration">Expiration:</label>
                <input type="text" id="expiration" name="expiration" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" placeholder="MM/YY" required oninput="formatExpiration(event)">
              </div>
              <div class="inputBox">
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="[0-9]{3}" maxlength="3" required>
              </div>
            </div>
          </div>
		  <input type="hidden" name="item_id" value="<?php echo $_GET['item_id']; ?>">

        </div>
      </div>
      <input type="submit" name="order" class="btn" value="Place Order">
    </form>
  </div>

<br>

<footer class="footer">
    <div class="footer-logo">
      <a href="http://localhost/buymart/Admin%20-%20Backend/Homepage.php"><img src="../home page/img/logo.png" alt="Logo"><a/>
    </div>
	<p id="copyr">©BuyMart.inc 2023</p>
    <div class="social-media">
      <a href="https://www.facebook.com/example"><img src="../home page/img/facebook.png" alt="Facebook"></a>
      <a href="https://www.twitter.com/example"><img src="../home page/img/twitter.png" alt="Twitter"></a>
      <a href="https://www.instagram.com/example"><img src="../home page/img/instagram.png" alt="Instagram"></a>
    </div>
  </footer>

<script>
  const paymentOptions = document.getElementsByName("payment");
  const creditCardInfo = document.getElementById("credit-card-info");
  const cardHolderInput = document.getElementById("card-holder");
  const cardNumberInput = document.getElementById("card-number");
  const expirationInput = document.getElementById("expiration");
  const cvvInput = document.getElementById("cvv");

  function toggleCreditCardInfo(enabled) {
    if (enabled) {
      creditCardInfo.style.display = "block";
      cardHolderInput.required = true;
      cardNumberInput.required = true;
      expirationInput.required = true;
      cvvInput.required = true;
    } else {
      creditCardInfo.style.display = "none";
      cardHolderInput.required = false;
      cardNumberInput.required = false;
      expirationInput.required = false;
      cvvInput.required = false;
    }
  }

  function formatCardNumber(event) {
    let input = event.target.value.replace(/\D/g, "");
    input = input.substring(0, 16);
    input = input.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/, "$1 $2 $3 $4");
    event.target.value = input;
  }

  function formatExpiration(event) {
    let input = event.target.value.replace(/\D/g, "");
    input = input.substring(0, 4);
    input = input.replace(/(\d{2})(\d{2})/, "$1/$2");
    event.target.value = input;
  }
  const phoneInput = document.getElementById("phone-input");
  const phoneError = document.getElementById("phone-error");

  phoneInput.addEventListener("input", validatePhoneNumber);

  function validatePhoneNumber() {
    const phoneNumber = phoneInput.value.trim();
    const isValid = /^\d{10}$/.test(phoneNumber);

    if (isValid) {
      phoneInput.classList.remove("error");
      phoneError.textContent = "";
    } else {
      phoneInput.classList.add("error");
      phoneError.textContent = "Phone number must be 10 digits";
    }
  }
</script>

</body>
</html>
