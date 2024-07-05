<?php
if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $userName = $_POST["username"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $cnfrmpwd = $_POST["cnfrmpwd"];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;


    require_once 'config.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignupCus($email,$firstName,$lastName,$userName,$phone,$pwd,$cnfrmpwd);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $cnfrmpwd);
    $uidExists = uidExistsCus($conn, $email, $userName);

    if ($emptyInput !== false)
    {
        header("Location:../customerAcc.php?error=emptyinput");
        exit();
    }
    if ($invalidEmail !== false)
    {
        header("Location:../customerAcc.php?error=invalidEmail");
        exit();
    }
    if ($pwdMatch !== false)
    {
        header("Location:../customerAcc.php?error=passwordsdontmatch");
        exit();
    }
    if ($uidExists !== false)
    {
        header("Location:../customerAcc.php?error=emailtaken");
        exit();
    }

    createCustomer($conn, $email, $firstName, $lastName, $userName, $phone, $pwd);

}
else
{
    header('Location:../reguser/loggedhome.php');
}

?>