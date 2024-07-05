<!DOCTYPE html>
  <html>
    <head>
        <link rel="stylesheet" href="css/styleaAcc.css">
        <script src="js/myscriptAcc.js"></script>
    </head>
    <body>
        <a href="#"><img src="img/logo.png" class="logo"></a>

        <div class="header">
            <div class="navbar">
                <a href="#" class="active">Home</a>
                <a href="#">About us</a>
                <a href="#">Trending items</a>
                <a href="#">Sell</a>
                <a href="#">FAQ</a>
            </div>
        </div>
        <div class="sublog">
            <?php
            session_start();
            if(isset($_SESSION["username"])){
                echo '<button id="log"><a href="login.php">Logout</a></button>
                <button id="log"><a href="#">Hello '.$_SESSION["firstName"].'</a></button>';
            }
            else{
                echo '<button id="log"><a href="login.php">Login</a></button>
                <button id="sub"><a href="customerAcc.php">Sign up</a></button>';
            }
            ?>
        </div>

        <a href="#"><img src="img/account.png" class="acc"></a>


        <br><br><br><br>
        <footer class="footer">
            <div class="footer-logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <p id="copyr">©BuyMart.inc 2023</p>
            <div class="social-media">
                <a href="https://www.facebook.com/example"><img src="img/facebook.png" alt="Facebook"></a> 
                <a href="https://www.twitter.com/example"><img src="img/twitter.png" alt="Twitter"></a> 
                <a href="https://www.instagram.com/example"><img src="img/instagram.png" alt="Instagram"></a> 
            </div>
        </footer>
    <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == "noerrorlogin")
            {
                echo"<script>alert('login successful');</script>";
            }
            elseif($_GET["error"] == "noerrorsignup")
            {
                echo"<script>alert('You have successfully created the account!');</script>";
            }
        }
    ?>        
    </body>
</html>