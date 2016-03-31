<?php

/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:22
 */

function sendQuery($q)
{
    $host = "localhost"; // Which server : localhost
    $username = "root"; // username
    $password = ""; // password
    $dbname = "my_db"; // Name of the database

    $db_error1 = "ERROR: connection to the databaseserver was not successful"; // error 1
    $db_error2 = "ERROR: selection of the database was not successful"; // error 2
    $db_error3 = "ERROR: closing of the database was not successful"; // error 3

    try {
        // Connection to the Databaseserver
        $db = mysqli_connect($host, $username, $password, $dbname) or die($db_error1);

        //Connection to the Database
        mysqli_select_db($db, $dbname) or die($db_error2);

        //Query and extra error messages
        $result = mysqli_query($db, $q) or die("ERROR: " . mysqli_errno($db) . " - " . mysqli_error($db));

        // Close Databaseconnection
        mysqli_close($db) or die ($db_error3);
    } catch (Exception $e) {
        $result = "-1";
        echo "issues with database";
    }

    return $result;
}

function connect()
{
    $DBServer = 'localhost';
    $DBUser = 'root';
    $DBPass = '';
    $DBName = 'my_db';

    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    return $conn;
}

function loginQuery($username, $password)
{
    $conn = connect();

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";

    $rs = $conn->query($sql);

    if ($rs === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $rows_returned = $rs->num_rows;
    }

//    $sql = "Select * From user Where username = ? AND password = ?";
//
//    $stmt = $conn->prepare($sql);
//
//    if ($stmt === false) {
//        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
//    }
//
//    $stmt->bind_param('ss', $username, $password);
//    $stmt->execute();
//    $rows_returned = $stmt->affected_rows;
//    $stmt->close();

    return $rows_returned;
}

function postQuery($text, $user, $time)
{
    $conn = connect();

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }

    $text = $conn->real_escape_string($text);
    $sql = 'INSERT INTO news(username, news, time) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    $stmt->bind_param('sss', $user, $text, $time);
    $stmt->execute();

    $stmt->close();
}

function updatePassword($user, $pass)
{
    $conn = connect();

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }
    $user = $user;
    $pass = $conn->real_escape_string($pass);
    $sql = "UPDATE user SET password = '$pass' WHERE username = '$user'";

    if ($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

}