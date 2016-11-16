<?php
include_once('../../vendor/autoload.php');
use App\Controller\CrimeType;

$crimeType = new CrimeType();
$crimeType->prepare($_POST)->update();
