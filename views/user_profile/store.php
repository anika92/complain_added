<?php
include_once ('../../vendor/autoload.php');
use App\Controller\User;


if((isset($_FILES['image']))&& !empty($_FILES['image']['name'])){
    $imageName=time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];
    move_uploaded_file($temporaryLocation,'../../Resources/images/users/'. $imageName);
    $_POST['image']= $imageName;
}

$user_info = new User();
$user_info->prepare($_POST)->userstore();

//var_dump($police_info);