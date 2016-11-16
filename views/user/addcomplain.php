<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Controller\User;
use App\Controller\RegAdmin;
use App\Controller\Auth;
$auth= new Auth();
$status= $auth->logged_in();
if($status== FALSE){
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('../index.php');

}
$fetch=$auth->fetchInfo();



$mp = new User();
$singleView = $mp->prepare($_GET)->userview();
$station=new RegAdmin();
$all_station=$station->indexstation();


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../Resources/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../../Resources/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php if($_SESSION['userType']=="User"){?>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="welcome.php" >Home</a>
                    </li>

                    <li>
                        <a href="../../views/criminal_info/criminalAll.php">View All Criminals</a>
                    </li>
                    <li>
                        <a href="../../views/criminal_info/mostwanted_index.php">View Most Wanted Criminals</a>
                    </li>
                    <li>
                        <a href="../../views/missing_person/addmissing.php">Add Missing Person</a>
                    </li>
                    <li>
                        <a href="../../views/missing_person/missing_index.php">View Missing Persons</a>
                    </li>



                </ul>
                <div class="navbar-custom-menu navbar-right">
                    <ul class="nav navbar-nav ">
                        <!-- Messages: style can be found in dropdown.less-->

                        <li class="dropdown user user-menu navbar-right">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../Resources/images/users/<?php echo $_SESSION['image'] ?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['user_name'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../../Resources/images/users/<?php echo $_SESSION['image'] ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $fetch->name ?>
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="userProfile.php?id=<?php echo $fetch->user_id ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">

                                        <a href="../authentication/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Notifications Menu -->



                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<link rel="stylesheet" href="../../Resources/formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="../../Resources/formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"  action="complain_store.php" enctype="multipart/form-data"><div class="title"><h2>Add complain Form</h2></div>


                <input type="hidden" class="large" type="text" name="name"  value=<?php echo $fetch->name ?> />





                <input type="hidden" class="large" type="text" name="id" value=<?php echo $fetch->user_id ?> />


    <div class="element-input">
        <label class="title"></label>
        <div class="item-cont">
            <input class="large" type="text" name="complainant" placeholder="Name Of Complainant"/>
            <span class="icon-place"></span>
        </div>
    </div>
    <div class="element-textarea">
        <label class="title"></label>
        <div class="item-cont">
            <textarea class="medium" name="description" cols="20" rows="5" placeholder="Description"></textarea>
            <span class="icon-place"></span>
        </div>
    </div>
        <input type="submit" value="Submit"/>

        <?php } ?>


