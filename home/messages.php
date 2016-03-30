<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:11
 */
include '../mainPHP/init.php';
include 'homePHP/checkForSession.php'
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Messages</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../home/homeCSS/style.css"/>
</head>
<body>
<div id="page">
    <div id="header">
        <div class="title">Social website</div>
        <div class="subText">You are logged in as <?php echo $_SESSION["userName"] ?></div>
    </div>
    <div id="bar">
        <div class="menuLink"><a href="home.php">Home</a></div>
        <div class="menuLink"><a href="messages.php">Messages</a></div>
        <div class="menuLink"><a href="pictures.php">Pictures</a></div>
        <div class="menuLink"><a href="profile.php">Profile</a></div>
        <div class="menuLink"><a href="homePHP/logOff.php">Log off</a></div>
    </div>

    <div id="pageContent">

        <div class="articleTitle">Messages</div>

        <div class="articleContent">

        </div>
    </div>

</div>
</body>
</html>