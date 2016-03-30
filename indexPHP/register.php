<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 15:05
 */
echo "working<br>";

include '../mainPHP/init.php';

$username = clearinvalidinput($_GET['username']);
$password1 = clearinvalidinput($_GET['password']);
$password2 = $_GET['password2'];

$query1 = "Select * From user WHERE username = '" . $username . "';";

if (mysqli_num_rows(sendQuery($query1)) == 1) {
    echo "username already exists";
    header("Refresh: 3; url=../register.html");
} elseif ($password1 == $password2 && $password1 != "") {
    $query2 = "Insert into `user`(`username`, `password`, `name`, `surname`) Values ('" . $username . "','" . $password1. "','','');";
    sendQuery($query2);
    echo "registered successfully";
    header("Refresh: 3; url=../index.html");
} else {
    echo "passwords do not match";
    header("Refresh: 3; url=../register.html");
}




