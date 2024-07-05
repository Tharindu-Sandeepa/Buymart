<!DOCTYPE html>
  <html>
    <head>
        <link rel="stylesheet" href="css/styleaAcc.css">
        <script src="js/myscriptAcc.js"></script>
    </head>
    <body>
        <a href="#"><img src="img/logo.png" class="logo"></a>

        <center>
            <h1>Customer Login</h1>
            <br><br>
            <form class="form" action="includes/login.inc.php" method="post">
                
                <input type="text" placeholder="Username" class="input" name="username" required>

                <input type="password" placeholder="Password" class="input" name="pwd" required>

                <!--<p class="check"><input type="checkbox" id="checkBox" onclick="enableButton()">
                    Accept Privacy Policy and Terms</p> -->    
                <br>
                <input type="submit" value="Log in" class="submit" name="submit" id="submitBtn"> 
                <div class="input-wrapper ">
                    <p>New Here ? <a href="customerAcc.php"><b>Sign Up</b></a></br> 
                    Are you a seller ?  <a href="#"><b>Seller Login</b></a><br>
                    Are you a system ?  <a href="#"><b>System Login</b></a></p>
                </div>    
            </form>
        </center> 

    </body>
</html>