<?php
session_start();
include_once ('../../vendor/autoload.php');
use App\Controller\RegAdmin;
use App\Message\Message;
use App\Utility\Utility;

$mp = new RegAdmin();
$mp->prepare($_POST)->updateAdminProf();
?>
