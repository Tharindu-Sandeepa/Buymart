<?php

require 'config.php';

$username = 'tharindu'; // The username for which you want to retrieve the password

// Retrieve the password from the database
$query = "SELECT password FROM seller WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $plainPassword = $row['password'];

    // Display the password
    echo "Password: " . $plainPassword;
} else {
    echo "User not found.";
}
?>