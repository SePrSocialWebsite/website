<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 19:19
 */


if(!isset($_SESSION["logged"])){
    echo "no sessions detected";
    header("Refresh: 0; url=../index.html");
    exit();
}