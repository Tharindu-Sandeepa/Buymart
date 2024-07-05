<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <link rel="stylesheet" href="css/styleaAcc2.css">
        <script src="js/myscriptAcc.js"></script>
    </head>
    <body>
        <?php 
            session_start();
            if(isset($_SESSION['username']))
            {$username =$_SESSION["username"];
            $email = $_SESSION["email"];}
            else{
                header('location:../index.php');
            }
        ?>
        <div class="logo-container">
        <a href="#"><img src="img/logo.png" class="logo"></a>
        </div>
        <div class="centered-content">
        <center>
            <h1>Customer Details</h1>

            <form class="form" action="includes/profileCus.inc.php" method="post">

            <h2>update Your Password</h2>
                <?php
                echo "<div class='container'>";
                echo "<span class='input2'>Username = ".$username."</span>";
                echo "<span class='input2'>Email = " .$email."</span>";
                echo "</div>";
                ?>
                <input type="password" name="old_pass" placeholder="enter your old password" class="input" required>
                <input type="password" name="new_pass" placeholder="enter your new password" class="input" required>
                <input type="password" name="cpass" placeholder="confirm your new password" class="input" required>

                <div class="input-wrapper ">
                <p class="check"><input type="checkbox" id="checkBox" onclick="enableButton()">
                    Accept Privacy Policy and Terms</p>    
                <input type="submit" value="update now" name="submit1" class="submit" id="submitBtn" disabled> 
                <h3>Do you want to delete your account?</h3> 
                <input type="submit" value="delete now" name="submit2" class="submit"> 
                <p>Are you a seller ?  <a href="viewProfile2.php"><b>Seller account</b></a>
                </div> 
            </form>
        </center> 
        </body>
    </html>