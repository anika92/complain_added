<?php
include_once('../../vendor/autoload.php');
use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;
use App\Controller\CriminalInfo;
use App\Controller\MissingPerson;
use App\Controller\RegPolice;
$criminal=new CriminalInfo();
$all_Criminal=$criminal->mostWanted();


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




            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>


            <?php foreach($all_Criminal as $criminal_p){

                ?>
                <hr>

                <div class="row">
                    <div class="col-md-3">


                        <!-- Preview Image -->
                        <img src="../../Resources/images/criminals/<?php echo $criminal_p->image?>" alt="image" height="100px" width="100px">
                    </div>
                    <div class="col-md-7">

                        <h3><?php echo $criminal_p->name?></h3><br />
                        Age: <?php echo $criminal_p->age?><br />
                        Height: <?php echo $criminal_p->height?><br />
                        Gender: <?php echo $criminal_p->gender?><br />
                        Type: <?php echo $criminal_p->c_t_type?><br />
                        Station:<?php echo $criminal_p->station_name?>

                    </div><br>
                    <a class="btn btn-primary" href="mostwanted_view.php?id=<?php echo $criminal_p->c_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


                </div>


            <?php } ?>
            <hr>

            <!-- Post Content -->
        </div>




        <!-- Posted Comments -->



        <!-- Comment -->




        <div class="col-md-4">


            <!-- Blog Search Well -->

            <h4> Search As</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">

                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>


                <!-- /.input-group -->


            </div>


            <div class="abt1">
                <h3>Missing Updates</h3>


                <?php foreach($all_MissingP as $missing_p){?>
                    <div class="might-grid">
                        <div class ="grid-might">
                            <img src="../../Resources/images/missing_persons/<?php echo $missing_p->image?>" alt="image" height="100px" width="100px">
                        </div>
                        <div class=" might-top">
                            <ul >

                                <h4><?php echo $missing_p->missing_name?></h4><br />
                                Age: <?php echo $missing_p->age?><br />
                                Height: <?php echo $missing_p->height?><br />
                                Gender: <?php echo $missing_p->gender?><br />



                            </ul>
                            <a class="btn btn-primary" href="missing_view.php?id=<?php echo $missing_p->missing_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="clearfix">

                        </div>


                        <hr>
                    </div>
                <?php }?>

            </div>

        </div>
    </div>
</div>
<hr class="featurette-divider">

<!-- Second Featurette -->



<!-- Third Featurette -->


<!-- Footer -->




<!-- /.container -->

<!-- jQuery -->

</body>

</html>

