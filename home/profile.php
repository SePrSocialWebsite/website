<?php
/**
 * Created by PhpStorm.
 * User: Vytautas
 * Date: 29-Mar-16
 * Time: 18:10
 */
include '../mainPHP/init.php';
include 'homePHP/checkForSession.php'
      

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Profile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../home/homeCSS/style.css"/>
</head>
<body>
    
    <?php
if(!empty($_POST)){
    $pass0 =  sanitizeInput($_POST["password0"]);
    $pass1 =  sanitizeInput($_POST["password1"]);
    $pass2 = sanitizeInput($_POST["password2"]);

if( $_SESSION["userPassword"]==$pass0){
   if($pass1===$pass2){
       $query = "update user set password='" . $pass1 . "' where username ='" . $_SESSION["userName"]. "';";
       sendQuery($query);
     if( isset($_SESSION)){
    session_destroy();
   
}
    header("Refresh: 3; url=../../index.html"); // message & redirect after 3 seconds
    echo "You are password changed   successfully.<br>You are being redirected.";
    echo "You are loggout.<br>You are being redirected.";
   }
     }
	else {
     echo '<script>alert("Please check your passoword andtry again");</script>';}
}

?>
    
    
    
    
<div id="page">
    <div id="header">
        <div class="title">Social website</div>
        <div class="subText">You are logged in as <?php echo  $_SESSION["userName"]?></div>
    </div>
    <div id="bar">
        <div class="menuLink"><a href="home.php">Home</a></div>
        <div class="menuLink"><a href="messages.php">Messages</a></div>
        <div class="menuLink"><a href="pictures.php">Pictures</a></div>
        <div class="menuLink"><a href="profile.php">Profile</a></div>
        <div class="menuLink"><a href="homePHP/logOff.php">Log off</a></div>
    </div>

    <div id="pageContent">

        <div class="articleTitle">Profile</div>

        <div class="articleContent">
            <form action="" method="POST">
                <label>Current password </label>
                <br/>
                <input type="password" name="password0">
                <br/>
                <label>New password</label>
                <br/>
                <input type="password" name="password1">
                <br/>
                <label>Repeat new password</label>
                <br/>
                <input type="password" name="password2">
                <br/>
                <button type="submit">Change password</button>
                <br/>
            </form>
        </div>


    </div>

</div>
</body>
</html>

