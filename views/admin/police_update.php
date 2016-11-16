<?php
session_start();
include_once ('../../vendor/autoload.php');
use App\Controller\RegPolice;
use App\Message\Message;
use App\Utility\Utility;

$mp = new RegPolice();
$mp->prepare($_POST)->updatePoliceByAdmin();
?>
