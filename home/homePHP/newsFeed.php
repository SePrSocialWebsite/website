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

postQuery($comment, $username, $now->format('Y-m-d H:i:s'));

header("Refresh: 0; url=../home.php");  //redirecting back to home page