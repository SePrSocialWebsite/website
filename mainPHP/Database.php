<?php

/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:22
 */

function sendQuery($q){
    $host = "localhost"; // Which server : localhost
    $username = "root"; // username
    $password = ""; // password
    $dbname = "my_db"; // Name of the database

    $db_error1 = "ERROR: connection to the databaseserver was not successful"; // error 1
    $db_error2 = "ERROR: selection of the database was not successful"; // error 2
    $db_error3 = "ERROR: closing of the database was not successful"; // error 3
    
    // Connection to the Databaseserver
    $db=mysqli_connect($host, $username, $password, $dbname)  or die($db_error1);

//  Connection to the Database
    mysqli_select_db($db, $dbname) or die($db_error2);

//Query and extra error messages
    $result = mysqli_query ($db, $q) or die("ERROR: " . mysqli_errno($db) . " - " . mysqli_error($db));


// Close Databaseconnection
    mysqli_close($db) or die ($db_error3);
    
    return $result;
}