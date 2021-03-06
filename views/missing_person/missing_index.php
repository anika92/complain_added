<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\MissingPerson;
use App\Message\Message;

$allView = new MissingPerson();
$allData=$allView->index();

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


<!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
        <div class="container">

            <h2>Missing Persons</h2>
        </div>
    </div>
</header></br>
<div class="container view">
    <div class="row">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">Missing Person's Gellery</h1>
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
                    <div class="center-block" style="height: 100px; width:100px;" >
                        <img class="img-responsive" src="../../Resources/images/missing_persons/<?php echo $view->image?>" alt="" height="auto" width="auto">
                    </div><br>
                    <h3>Name: <?php echo $view->missing_name ?></h3>
                    <h3>Age: <?php echo $view->age ?></h3>
                    <h3>Height: <?php echo $view->height ?></h3>

                    <h3>Date: <?php echo $view->date ?></h3>
                    <a href="missing_view.php?id=<?php echo $view-> missing_id ?>" class="btn btn-primary" role="button">Details</a>

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
