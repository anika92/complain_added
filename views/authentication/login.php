<?php
session_start();
include_once('../../vendor/autoload.php');


use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;

if(!isset($_POST['userType'])){
    $_POST['userType']="User";
}

$auth= new Auth();
$status= $auth->logged_in();


if($status == TRUE) {
    Message::message("logged in");
    if($_SESSION['userType']=="User"){
    Utility::redirect('../user/welcome.php');
    }
    if($_SESSION['userType']=="Admin"){
        Utility::redirect('../admin/welcome.php');
    }
    if($_SESSION['userType']=="Police"){
        Utility::redirect('../police/welcome.php');
    }
}
else{
    $status= $auth->prepare($_POST)->is_registered();
    if($status){
        $_SESSION['user_email']=$_POST['email'];
        $_SESSION['userType']=$_POST['userType'];
        if($_SESSION['userType']=="User"){
            Utility::redirect('../user/welcome.php');
        }
        if($_SESSION['userType']=="Admin"){
            Utility::redirect('../admin/welcome.php');
        }
        if($_SESSION['userType']=="Police"){
            Utility::redirect('../police/welcome.php');
        }
    }else{
        Message::message("Wrong username or password");
        if($_SESSION['userType']=="User"){
            Utility::redirect('../../index.php');
        }
       else{
            Utility::redirect('../../index.php');
        }
    }
}

