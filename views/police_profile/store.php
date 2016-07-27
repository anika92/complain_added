<?php
include_once ('../../vendor/autoload.php');
use App\Controller\RegPolice;
if((isset($_FILES['image']))&& !empty($_FILES['image']['name'])){
    $imageName=time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];
    move_uploaded_file($temporaryLocation,'../../Resources/images/polices/'. $imageName);
    $_POST['image']= $imageName;
}

$police_info = new RegPolice();
$police_info->prepare($_POST)->policestore();

//var_dump($p