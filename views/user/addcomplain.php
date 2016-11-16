<?php
include_once('../../vendor/autoload.php');
use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;
use App\Controller\CriminalInfo;
use App\Controller\MissingPerson;
use App\Controller\RegPolice;
$criminal=new CriminalInfo();
$all_Criminal=$criminal->policeviewcrime();


$missing=new MissingPerson();
$all_MissingP=$missing->index();


$auth= new Auth();
$status= $auth->logged_in();
if($status== FALSE){
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('../../index.php');

}
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
                    <a href="index.php" >Home</a>
                </li>
                <li>
                    <a href="criminalInfo.php">Add Criminal</a>
                </li>
                <li>
                    <a href="../missing_person/missing_person.php">Add Missing Person</a>
                </li>
                <li>
                    <a href="views/authentication/logout.php">LogOut</a>
                </li>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Width Image Header -->


<!-- Page Content -->
<div class="container">

    <?php include_once('criminalInfo.php') ?>
</div>
<hr class="featurette-divider">

<!-- Second Featurette -->



<!-- Third Featurette -->


<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
</footer>



<!-- /.container -->

<!-- jQuery -->

</body>

</html>

