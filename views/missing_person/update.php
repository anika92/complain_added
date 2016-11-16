<?php
session_start();
include_once ('../../vendor/autoload.php');
use App\Controller\MissingPerson;
use App\Message\Message;
use App\Utility\Utility;

$mp = new MissingPerson();
$singleView = $mp->prepare($_POST)->view();
if((isset($_FILES['image']))&& !empty($_FILES['image']['name'])){
    $imageName=time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];
    move_uploaded_file($temporaryLocation,'../../Resources/images/missing_persons/'. $imageName);
    $_POST['image']= $imageName;
}
$mp->prepare($_POST)->update();
?>

