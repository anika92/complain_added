<?php
include_once('../../vendor/autoload.php');
use App\Controller\auth;
use App\Controller\RegAdmin;
use App\Controller\CrimeType;
$auth= new Auth();
$status= $auth->logged_in();
if($status == TRUE) {
    $fetch = $auth->fetchInfo();

    $ct = new CrimeType();
    $ct->prepare($_GET)->deleteCrimeType();
}
else{
    echo "not authoraized";
}
?>