<?php

/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:20
 */

function clearinvalidinput($text){

    $text = htmlspecialchars($text);
    $text = stripslashes($text);
    return $text;
    
}