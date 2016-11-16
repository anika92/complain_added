<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\CriminalInfo;
use App\Message\Message;

$mp = new CriminalInfo();
$singleView = $mp->prepare($_GET)->view();

//use App\Message\Message;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/one-page-wonder.css">
    <link rel="stylesheet" type="text/css" href="../../Resources/bootstrap/js/bootstrap.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<br>

<div class="view">
    <div class="row" >

        <div class="col-lg-12">
            <h1 class="page-header" align="center">View Individual Criminal</h1>
        </div>
        <div id="message">
            <?php
            if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
                echo Message::message();
            }
            ?>
        </div>

        <div class="table-bordered" style="border: solid gray">
            <br>
            <div class="thumbnail">
                <img class="img-responsive" src="../../Resources/images/criminals/<?php echo $singleView->image?>" alt="" height="300px" width="400px">
            </div>
            <h3><?php echo $singleView->name ?></h3>

            <table class="table table-striped">

                <tbody>

                <tr><td>Name:</td> <td><?php echo $singleView->name?></td></tr>
                <tr><td>Description:</td> <td><?php echo $singleView->description?></td></tr>
                <tr><td>Crime Type</td><td><?php echo $singleView->crime_type?></td></tr>
                <tr><td>Criminal Type:</td><td><?php echo $singleView->c_t_type ?></td></tr>

                <tr><td>Age:</td> <td><?php echo $singleView->age?></td></tr>
                <tr><td>Height:</td> <td><?php echo $singleView->height?></td></tr>
                <tr><td>Gender:</td> <td><?php echo $singleView->gender?></td></tr>
                <tr><td>Address:</td> <td><?php echo $singleView->address?></td></tr>
                <tr><td>Date:</td> <td><?php echo $singleView->release_date?></td></tr>
                <tr><td>Station Name:</td> <td><?php echo $singleView->station_name ?></td></tr>

                <!--<tr><td>Added by:</td> <td>Police</td></tr>
                <tr><td>Updated by:</td> <td>Police</td></tr>-->

                </tbody>
            </table>
            </br>
            <div class="thumbnail text-center">
                <?php
                if($_SESSION['userType']=="User"){
                    ?>
                    <a href="../user/welcome.php" class="btn btn-primary btn-lg" role="button">Back</a>
                    <?php
                } else{
                    ?>
                <a href="criminal_edit.php?id=<?php echo $singleView-> c_id ?>" class="btn btn-primary btn-lg" role="button">Update</a>&nbsp
                <a href="missing_index.php" class="btn btn-primary btn-lg" role="button">Back</a>
            <?php
                }
                ?>

            </div>
        </div>


    </div>
</div>
</div>





<hr>



<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
