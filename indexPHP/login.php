<?php
$str = "Hello world!";
echo $str;
echo "<br>";
$user1 =  $_GET['username'];
echo $user1;
echo "<br>";
$pass1 = $_GET['password'];
echo $pass1;
echo "<br>";
echo "What a nice day!";
echo "<br>";

include '../mainPHP/init.php';

$query = "Select * from user where username ='" . $user1 . "' and password ='" . $pass1 . "';";


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