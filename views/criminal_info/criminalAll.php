<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\CriminalInfo;
use App\Message\Message;

$allView = new CriminalInfo();
$allData=$allView->index();

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
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

<!-- Collect the nav links, forms, and other content for toggling -->
<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="#about" >Home</a>
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
</div>-->-->
<!-- /.navbar-collapse -->

<!-- /.container -->
<!--</nav>-->

<!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
        <div class="container">

            <h2>All Criminals</h2>
        </div>
    </div>
</header></br>
<div class="container view">
    <div class="row">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">All Criminals Gellery</h1>
            </div>
            <div id="message">
                <?php
                if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
                    echo Message::message();
                }
                ?>
            </div>

            <?php
            foreach($allData as $view){
                /*var_dump($view);
                die();
                */?>


                <div class="col-lg-3 col-md-3 col-xs-6 col-lg-4 thumbnail" >
                    <div class="center-block" style="width:100px; height: 100px;">
                        <img class="img-responsive" src="../../Resources/images/criminals/<?php echo $view->image?>" alt="" height="100px" width="100px">
                    </div><br>
                    <h3>Name: <?php echo $view->name ?></h3>
                    <h3>Age: <?php echo $view->age ?></h3>
                    <h3>Height: <?php echo $view->height ?></h3>

                    <h3>Date: <?php echo $view->gender ?></h3>
                    <a href="criminalSingleView.php?id=<?php echo $view-> c_id ?>" class="btn btn-primary" role="button">Details</a>

                </div>
            <?php } ?>

        </div>
    </div>





    <hr>
</div>
</div>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
