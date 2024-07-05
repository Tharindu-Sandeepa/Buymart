<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styleaAcc.css">
        <script src="js/myscriptAcc.js"></script>
    </head>

        <div class="logo-container">
        <a href="#"><img src="img/logo.png" class="logo"></a>
        </div>
        <div class="centered-content">
        <center>
            <h1>Create an Account</h1>
            <h2>Customer account</h2>
            <form class="form" action="includes/signupCus.inc.php" method="post">
                
                <input type="email" placeholder="Email" class="input" name="email" pattern="[a-z0-9._+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
                <input type="text" placeholder="First Name" class="input" name="fname" required>
                <input type="text" placeholder="Last Name" class="input" name="lname" required>
                <input type="text" placeholder="Username" class="input" name="username" required>
                <input type="phone" placeholder="Mobile number" class="input" name="phone" pattern="[0-9]{10}" required>
                <input type="password" placeholder="Password" class="input" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <input type="password" placeholder="Confirm Password" name="cnfrmpwd" class="input" required>
                
                <div class="input-wrapper ">
                <p class="check"><input type="checkbox" id="checkBox" onclick="enableButton()">
                    Accept Privacy Policy and Terms</p>    
                
                <input type="submit" value="Create account" name="submit" class="submit" id="submitBtn" disabled> 

                    <p>Are you a seller ?  <a href="sellerAcc.php"><b>Seller account</b></a>
                    <br>Already have an account ?  <a href="../home page/loginform.html"><b>Login</b></a></p>
                </div> 
            </form>
        </center> 
        </body>
    </html>