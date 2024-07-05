<?php
if(isset($_POST["submit"]))
{
    $busName = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["username"];
    $pwd = $_POST["pwd"];
    $cnfrmpwd = $_POST["cnfrmpwd"];
    $location = $_POST["country"];

    require_once 'config.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignupSeller($busName,$email,$userName,$pwd,$cnfrmpwd,$location);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd,$cnfrmpwd);
    $uidExists = uidExistsSeller($conn,$email,$userName);

    if ($emptyInput !== false)
    {
        header("Location:../SellerAcc.php?error=emptyinput");
        exit();
    }
    if ($invalidEmail !== false)
    {
        header("Location:../sellerAcc.php?error=invalidEmail");
        exit();
    }
    if ($pwdMatch !== false)
    {
        header("Location:../sellerAcc.php?error=passwordsdontmatch");
        exit();
    }
    if ($uidExists !== false)
    {
        header("Location:../sellerAcc.php?error=emailtaken");
        exit();
    }

    createSeller($conn, $busName, $email, $userName, $pwd, $location);
}
else
{
    header('Location:../login.php');
}


?>