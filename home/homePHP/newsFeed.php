<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 19:45
 */
include '../../mainPHP/init.php';
include '../homePHP/checkForSession.php';

$comment =  sanitizeInput($_GET['comment']);
$username = $_SESSION["userName"];
$now = new DateTime();

$query = "INSERT INTO `news`(`username`, `news`, `time`) VALUES ('" . $username . "','" . $comment . "','" .$now->format('Y-m-d H:i:s') ."');";

sendQuery($query);

header("Refresh: 0; url=../home.php");  //redirecting back to home page