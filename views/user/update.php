<?php
session_start();
include_once ('../../vendor/autoload.php');
use App\Controller\User;
use App\Message\Message;
use App\Utility\Utility;

$mp = new User();
$singleView = $mp->prepare($_POST)->userview();
if((isset($_FILES['image']))&& !empty($_FILES['image']['name'])){
    $imageName=time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];
    move_uploaded_file($temporaryLocation,'../../Resources/images/users/'. $imageName);
    $_POST['image']= $imageName;
}
$mp->prepare($_POST)->update();
?>
