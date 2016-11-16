<?php
include_once ('../../vendor/autoload.php');
use App\Controller\Complain;

$complain = new Complain();
$complain->prepare($_POST)->complainstore();
