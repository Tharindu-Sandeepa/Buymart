<?php
function emptyInputSignupCus($email,$firstName,$lastName,$userName,$phone,$pwd,$cnfrmpwd)
{
    if(empty($email)||empty($firstName)||empty($lastName)||empty($phone)||empty($pwd)||empty($cnfrmpwd)||empty($userName))
    {
        return true;
    }
    else{
        return false;
    }
}

function invalidEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $cnfrmpwd)
{
    if($pwd !== $cnfrmpwd)
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExistsCus($conn, $email, $userName)
{
    $sql = "SELECT * FROM customer WHERE email= ? OR userName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location:../customerAcc.php?error=stmtfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss" , $email,$userName);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        return false;
    }
}

function createCustomer($conn, $email, $firstName, $lastName, $userName, $phone, $pwd)
{
    $sql = "INSERT INTO customer (email,first_name,last_name,userName,phone_number,password) VALUES (?,?,?,?,?,?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location:../customerAcc.php?error=stmtfaild");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssis", $email, $firstName, $lastName,$userName, $phone, $hashedPwd);
    mysqli_stmt_execute($stmt);
    session_start();
    $_SESSION["username"]= $userName;
    $_SESSION["firstName"] = $firstName;
    mysqli_stmt_close($stmt);
    header("Location:../../home page/loginform.html");
    exit();
}

// end signup.inc.php function code
// beginning login.inc.php code

function LoginUser($conn,$userName, $pwd)
{
    $uidExists = uidExistsCus($conn, $userName, $userName);
    if($uidExists === false)
    {
        header("Location:../customerAcc.php?error=wrongusername");
        exit();
    }
    
        $pwdHashed = $uidExists["password"];
        $checkPwd = password_verify($pwd,$pwdHashed);
    
        if($checkPwd === false)
        {
            header("Location:../customer.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd === true)
        {
            session_start();
            $_SESSION["userid"] = $uidExists["seller_Id"];
            $_SESSION["username"] = $uidExists["userName"];
            $_SESSION["firstName"] = $uidExists["first_name"];
            header("Location:../index.php?error=noerrorlogin");
        }

}
function emptyInputLogin($userName,$pwd)
{
    if(empty($userName) || empty($pwd))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// end login.inc.php function code
// beginning signupSeller.inc.php code

function emptyInputSignupSeller($busName,$email,$userName,$pwd,$cnfrmpwd,$location)
{
    if(empty($busName)||empty($email)||empty($userName)||empty($pwd)||empty($cnfrmpwd)||empty($location))
    {
        return true;
    }
    else{
        return false;
    }
}

function uidExistsSeller($conn, $email, $userName)
{
    $sql = "SELECT * FROM seller WHERE bus_email= ? OR username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location:../sellerAcc.php?error=stmtfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss" , $email,$userName);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        return false;
    }
}

function createSeller($conn, $busName, $email, $userName, $pwd, $location)
{
    $sql = "INSERT INTO seller (bus_name,bus_email,username,location,password) VALUES (?,?,?,?,?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location:../sellerAcc.php?error=stmtfaild");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss",  $busName, $email, $userName, $location, $hashedPwd);
    mysqli_stmt_execute($stmt);
    session_start();
    $_SESSION["username"]= $userName;
    $_SESSION["businessName"] = $busName;
    mysqli_stmt_close($stmt);
    header("Location:../../seller/loginform.html");
    exit();
}

?>