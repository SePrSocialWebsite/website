<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 31-Mar-16
 * Time: 22:10
 */

include '../../mainPHP/init.php';
include '../homePHP/checkForSession.php';

$user = $_SESSION['userName'];
$currentpsw = sanitizeInput($_GET['password0']);
$newpsw1 = sanitizeInput($_GET['password1']);
$newpsw2 = $_GET['password2'];

if (loginQuery($user, $currentpsw) == 1) {
    if ($newpsw1 == $newpsw2 && $newpsw1 != "") {
        updatePassword($user, $newpsw1);
        echo "password has been changed successfully";
        header("Refresh: 3; url=../profile.php");
    }
    else{
        echo "new passwords do not match";
        header("Refresh: 3; url=../profile.php");
    }
} else {
    echo "current password is not correct";
    header("Refresh: 3; url=../profile.php");
}
