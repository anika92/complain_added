<?php
include_once('../vendor/autoload.php');
use App\Message\Message;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>System Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/bootstrap/css/bootstrap.css"/>
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<div class="message">
    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
        echo Message::message();
    }
    ?>

    <a class="btn btn-primary" target="_blank" href="police/regPolice.php">Police Registration</a>
<!-- Start Formoid form-->
<link rel="stylesheet" href="../Resources/formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="../Resources/formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post" action="authentication/login.php"><div class="title"><h2>System Login</h2></div>

    <div class="element-email">
        <label class="title"><span class="required">*</span>
        </label><div class="item-cont">
            <input class="large" type="email" name="email" value="" required="required" placeholder="Email"/>
            <span class="icon-place"></span>
        </div>
    </div>
    <div class="element-password">
        <label class="title">
            <span class="required">*</span>
        </label><div class="item-cont">
            <input class="large" type="password" name="password" value="" required="required" placeholder="Password"/>
            <span class="icon-place"></span>
        </div>
    </div>
    <div class="form-group">
        <label>Select User</label>
        <select name="userType" class="form-control" id="userType">
            <option>Select User</option>
            
            <option value="Police">Police</option>
            <option value="Admin">Admin</option>
        </select>

    </div>

    <div class="submit">
        <input type="submit" value="Submit"/>
    </div>


    </form><p class="frmd">
    <a href="http://formoid.com/v29.php">bootstrap forms</a> Formoid.com 2.9</p>
<script type="text/javascript" src="../Resources/formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->

</body>
</html>
