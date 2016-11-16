<?php
session_start();
include_once ('../../vendor/autoload.php');
use App\Controller\RegAdmin;
use App\Message\Message;
use App\Utility\Utility;
var_dump($_POST);
$mp = new RegAdmin();

$mp->prepare($_POST)->update_station();
?>

