<?php
$str = "working";
echo $str;
echo "<br>";

include '../mainPHP/init.php';

$user1 =  sanitizeInput($_GET['username']);
$pass1 = sanitizeInput($_GET['password']);

$query = "Select * from user where username ='" . $user1. "' and password ='" . $pass1 . "';";


if (mysqli_num_rows(sendQuery($query)) == 1)
{
    $_SESSION["logged"] ="true";
    $_SESSION["userName"] = $user1;
    $_SESSION["userPassword"] = $pass1;

    header("Refresh: 3; url=../home/home.php"); // message & redirect after 3 seconds
    echo "You are logged in successfully.<br>You are being redirected.";
}
else {
    header("Refresh: 3; url=../index.html");
    echo "Bad password or login name.<br>You are being redirected.";
}