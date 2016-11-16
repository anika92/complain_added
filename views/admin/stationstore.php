<?php
include_once ('../../vendor/autoload.php');
use App\Controller\RegAdmin;

$admin = new RegAdmin();
$admin->prepare($_POST)->stationstore();