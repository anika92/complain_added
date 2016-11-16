<?php
session_start();
include_once('../../vendor/autoload.php');

use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;

$auth= new Auth();
$status= $auth->log_out();
if($status){
    Message::message("You are successfully logged-out");
    if($_SESSION['userType']=="Police"){
         Utility::redirect('../index.php');
        $_SESSION['userType']=="";
    }
    if($_SESSION['userType']=="Admin"){
        Utility::redirect('../index.php');
        $_SESSION['userType']=="";
    }
    if($_SESSION['userType']=="User"){
        Utility::redirect('../../index.php');
        $_SESSION['userType']=="";
    }
}