<?php

/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:20
 */

function sanitizeInput($text){

    $text = htmlspecialchars($text);
    $text = stripslashes($text);
    //$text = mysqli_real_escape_string($text);
    $text = addcslashes($text, '%_');
    return $text;
    
}