<?php
include_once('../../vendor/autoload.php');
use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;
use App\Controller\CriminalInfo;
use App\Controller\MissingPerson;
$criminal=new CriminalInfo();
$all_Criminal=$criminal->index();

$missing=new MissingPerson();
$all_MissingP=$missing->index();


$auth= new Auth();
$status= $auth->logged_in();
if($status == TRUE) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../Resource/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../Resources/css/one-page-wonder.css">
        <link rel="stylesheet" type="text/css" href="../../Resource/bootstrap/js/bootstrap.js">
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
                        <a href="views/criminal_info/criminalInfo.php">Add Criminal</a>
                    </li>
                    <li>
                        <a href="views/missing_person/missing_person.php">Add Missing Person</a>
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
    <header class="header-image">
        <div class="headline">
            <div class="container">

                <h2>Welcome To Police Department</h2>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div  class="container">
        <hr class="featurette-divider">
        <div class="message">
            <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                echo Message::message();
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-8">





                <!-- Blog Post -->

                <!-- Title -->
                <h1>Criminal List</h1>

                <!-- Author -->


                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <?php foreach($all_Criminal as $criminal_p){?>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Preview Image -->
                                <img src="../../Resources/images/<?php echo $criminal_p->image?>" alt="image" height="100px" width="100px">
                            </div>
                            <div class="col-md-7 ">
                                <h3><?php echo $criminal_p->name?></h3><br />
                                Age: <?php echo $criminal_p->age?><br />
                                Height: <?php echo $criminal_p->height?><br />
                                Gender: <?php echo $criminal_p->gender?><br />
                                Type: <?php echo $criminal_p->c_t_type?><br />
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <!-- Post Content -->
            </div>




            <!-- Posted Comments -->



            <!-- Comment -->




            <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4> Search As</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">

                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <!-- /.input-group -->



                </div>
                <div class="well">
                    <h4>Missing Updates</h4>

                    <?php foreach($all_MissingP as $missing_p){?>
                        <ul >

                            <h3><?php echo $missing_p->missing_name?></h3><br />
                            Age: <?php echo $missing_p->age?><br />
                            Height: <?php echo $missing_p->height?><br />
                            Gender: <?php echo $missing_p->gender?><br />



                        </ul>
                    <?php }?>
                </div>
            </div>
        </div>
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
    </div>


    <!-- /.container -->

    <!-- jQuery -->

    </body>

    </html>

    <?php
}
?>