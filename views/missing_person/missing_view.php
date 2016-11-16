<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\MissingPerson;
use App\Message\Message;

$mp = new MissingPerson();
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

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="../../index.php" >Home</a>
                </li>
                <li>
                    <a href="missing_index.php">Missing Person</a>
                </li>
                <li>
                    <a href="../criminal_info/mostwanted_index.php">Most Wanted</a>
                </li>

                <li><a href="../user/regUser.php">Public Register</a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Width Image Header -->

<!-- Navigation -->
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

<!-- Collect the nav links, forms, and other content for toggling -->

<!-- /.navbar-collapse -->
<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="../../index.php" >Home</a>
        </li>
        <li>
            <a href="#about">Missing Person</a>
        </li>
        <li>
            <a href="#services">Most Wanted</a>
        </li>
        <li>
            <a href="#contact">Contact Us</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register As <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="views/police/regPolice.php">Police</a></li>
                <li><a href="views/user/regUser.php">Public</a></li>

            </ul>
        </li>
    </ul>
    <ul class="dropdown-menu">Register As
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">JavaScript</a></li>
    </ul>
</div></nav>
<!-- /.container -->


<!-- Full Width Image Header -->
<br>

<div class="view">
    <div class="row" >

        <div class="col-lg-12">
            <h1 class="page-header" align="center">View Individual Missing Person</h1>
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
                <img class="img-responsive" src="../../Resources/images/missing_persons/<?php echo $singleView->image?>" alt="" height="300px" width="400px">
            </div>
            <h3><?php echo $singleView->missing_name ?></h3>

            <table class="table table-striped">

                <tbody>

                <tr><td>Name:</td> <td><?php echo $singleView->missing_name?></td></tr>
                <tr><td>Description:</td> <td><?php echo $singleView->description?></td></tr>
                <tr><td>Age:</td> <td><?php echo $singleView->age?></td></tr>
                <tr><td>Height:</td> <td><?php echo $singleView->height?></td></tr>
                <tr><td>Gender:</td> <td><?php echo $singleView->gender?></td></tr>
                <tr><td>Station:</td><?php echo $singleView->station_name ?></tr>
                <tr><td>Gender:</td> <td><?php echo $singleView->address?></td></tr>
                <tr><td>Date:</td> <td><?php echo $singleView->date?></td></tr>
                <tr><td>Status:</td> <td><?php echo $singleView->status?></td></tr>
                <!--<tr><td>Added by:</td> <td>Police</td></tr>
                <tr><td>Updated by:</td> <td>Police</td></tr>-->

                </tbody>
            </table>
            </br>
            <div class="thumbnail text-center">
               <!-- <a href="missing_edit.php?id=<?php /*echo $singleView-> missing_id */?>" class="btn btn-primary btn-lg" role="button">Update</a>&nbsp
                --><a href="missing_index.php" class="btn btn-primary btn-lg" role="button">Back</a>
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
