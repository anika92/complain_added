<?php
include_once('../../vendor/autoload.php');
use App\Controller\auth;
use App\Controller\RegAdmin;
$auth= new Auth();
$status= $auth->logged_in();
if($status == TRUE) {
    $fetch = $auth->fetchInfo();

    $station = new RegAdmin();
    $station->prepare($_GET)->deleteStation();
}
else{
    echo "not authoraized";
}
    ?>