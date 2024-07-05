<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styleaAcc.css">
        <script src="js/myscriptAcc.js"></script>
    </head>
    <body>

        <div class="logo-container">
        <a href="#"><img src="img/logo.png" class="logo"></a>
        </div>
        <div class="centered-content">
        <center>
            <h1>Create an Account</h1>
            <h2>Seller account</h2>

            <form class="form" action="includes/signupSeller.inc.php" method="post">
                
                <input type="text" placeholder="Business Name" class="input" name="name" required>
                <input type="email" placeholder="Business email" class="input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
                <input type="text" placeholder="Username" class="input" name="username" required>
                <input type="password" placeholder="Password" class="input" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <input type="password" placeholder="Confirm Password" name="cnfrmpwd" class="input" required>    
                <div class="input-wrapper">
                <label for="location">Business Location</label>
                <div><input type="text" placeholder="United States" class="input" name="country" required></div>
                <p class="text">If you don't have a legal business, enter country of your residence.</p>

                <p class="check"><input type="checkbox" id="checkBox" onclick="enableButton()">
                        Accept Privacy Policy and Terms</p>     

                    <input type="submit" value="Create account" name="submit" class="submit" id="submitBtn" disabled>      
                
                    <p>Already have an account ?  <a href="../home page/loginform.html"><b>Login</b></a></p>
            </form>
        </center> 
    
        </body>
    </html>