<?php
session_start();
include_once ('../../vendor/autoload.php');

use App\Controller\CriminalInfo;
use App\Message\Message;
use App\Utility\Utility;

$array_values=$_POST['multiple'];
//Utility::d($_POST['Hobby']);
$comma_separated_value=implode(",",$array_values);

$_POST['multiple']=$comma_separated_value;

$mp = new CriminalInfo();
if((isset($_FILES['image']))&& !empty($_FILES['image']['name'])){
    $imageName=time().$_FILES['image']['name'];
    $temporaryLocation= $_FILES['image']['tmp_name'];
    move_uploaded_file($temporaryLocation,'../../Resources/images/criminals/'. $imageName);
    $_POST['image']= $imageName;
}


$mp->prepare($_POST)->updateByAdmin();

?>
