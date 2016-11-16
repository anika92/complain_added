<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\CriminalInfo;
use App\Message\Message;
use App\Controller\Auth;
use App\Utility\Utility;

$allView = new CriminalInfo();
$allData=$allView->mostWanted();



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
    <link rel="stylesheet" href="../../Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Resources/css/style.css">
    <link rel="stylesheet" href="../../Resources/css/jquery.bxslider.css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


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
                    <a href="../missing_person/missing_index.php">Missing Person</a>
                </li>
                <li>
                    <a href="mostwanted_index.php">Most Wanted</a>
                </li>

                <li><a href="../user/regUser.php">Public Register</a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Width Image Header -->
<!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
        <div class="container">

            <h2>Most Wanted</h2>
        </div>
    </div>
</header>
<br>

<div class="row view">

    <div class="col-lg-12">
        <h1 class="page-header" align="center">Most Wanted</h1>
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
                <div class="center-block" style="height: 100px; width: 100px;">
                    <img class="img-responsive" src="../../Resources/images/criminals/<?php echo $view->image?>"
                         alt="" height="auto" width="auto">
                </div>
                <h5>Name: <?php echo $view->name ?></h5>
                <h5>Age: <?php echo $view->age ?></h5>
                <h5>Height: <?php echo $view->height ?></h5>
                <h5>Gender: <?php echo $view->gender ?></h5>
                <h5>Station: <?php echo $view->station_name ?></h5>
                <h5>Address: <?php echo $view->address ?></h5>
                <a href="mostwanted_view.php?id=<?php echo $view-> c_id ?>" class="btn btn-primary" role="button">Details</a>

            </div>
        <?php } ?>


</div>
</div>





<hr>



<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
