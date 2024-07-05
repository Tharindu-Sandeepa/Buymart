<?php
if(isset($_POST["submit"]))
{
    $userName = $_POST["username"];
    $pwd = $_POST["pwd"];

    require_once 'config.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($userName,$pwd) !== false)
    {
        exit();
    }

    LoginUser ($conn ,$userName,$pwd); 
}
else
{
    header('Location:../seller/dashboard.php');
}

?>