<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 19:15
 */
include '../../mainPHP/init.php';

if( isset($_SESSION)){
    session_destroy();
    header("Refresh: 1; url=../../index.html"); // message & redirect after 3 seconds
    echo "You are loggout.<br>You are being redirected.";
}