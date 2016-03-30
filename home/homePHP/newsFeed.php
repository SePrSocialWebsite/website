<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 19:45
 */
include '../../mainPHP/init.php';

echo  $_GET['comment'];

header("Refresh: 1; url=../home.php");  //redirecting back to home page