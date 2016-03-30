<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 15:05
 */
echo "working<br>";

include '../mainPHP/init.php';

$username = $_GET['username'];
if (!preg_match('/^[\w]+$/', $username)) {
    echo "username contains not allowed characters";
    header("Refresh: 3; url=../register.html");
} else {
    $username = sanitizeInput($username);
    $password1 = sanitizeInput($_GET['password']);
    $password2 = $_GET['password2'];

    $query1 = "Select * From user WHERE username = '" . $username . "';";

    if (mysqli_num_rows(sendQuery($query1)) == 1) {
        echo "username already exists";
        header("Refresh: 3; url=../register.html");
    } elseif ($password1 == $password2 && $password1 != "") {
        $query2 = "Insert into `user`(`username`, `password`, `name`, `surname`) Values ('" . $username . "','" . $password1 . "','','');";
        sendQuery($query2);
        echo "registered successfully";
        header("Refresh: 3; url=../index.html");
    } else {
        echo "passwords do not match";
        header("Refresh: 3; url=../register.html");
    }
}






