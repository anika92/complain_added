<?php
//session_start();
include_once('../../vendor/autoload.php');
use App\Controller\RegPolice;
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
$_SESSION['image']=$fetch->image;
$mp = new RegPolice();
$singleView = $mp->prepare($_GET)->policeview();
$station=new RegAdmin();
$all_station=$station->indexstation();


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

<body>

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
                        <a href="mostwanted_index.php">Most Wanted</a>
                    </li>
                    <li>
                        <a href="criminalAll.php">Criminals</a>
                    </li>
                    <li>
                        <a href="missing_index.php">Missing Persons</a>
                    </li>

                    <li>
                        <a href="addmissing.php">Add Missing Person</a>
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

<?php } ?>

<?php if($_SESSION['userType']=="Police"){?>

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
                        <a href="mostwanted_index.php">Most Wanted</a>
                    </li>
                    <li>
                        <a href="criminalAll.php">Criminals</a>
                    </li>
                    <li>
                        <a href="missing_index.php">Missing Persons</a>
                    </li>

                    <li>
                        <a href="addmissing.php">Add Missing Person</a>
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
<?php }  ?>
<!-- Full Width Image Header -->
<br>

<div class="view">
    <div class="row" >

        <div class="col-lg-12">
            <h1 class="page-header" align="center">Hi !! <?php echo $singleView->name  ?> You Can Edit Your Profile From Here</h1>
        </div>

        <div class="table-bordered" style="border: solid gray">
            <br>
            <form role="form" action="update.php" method="post" enctype="multipart/form-data">
                <div class="thumbnail">
                    <img class="img-responsive" src="../../Resources/images/polices/<?php echo $singleView->image?>" alt="" height="300px" width="400px">
                    <level>Select Image:</level><buttn><input type="file" class="input-group-lg form-control" id="pwd" name="image"></buttn>
                </div>




                <table class="table table-striped">

                    <tbody>
                    <input type="text" name="id" style="display: none" value="<?php echo $singleView->p_id ?>">
                    <tr><td>Name:</td><td>
                            <div class="form-group">

                                <input type="text" class="form-control" id="usr" name="name" value="<?php echo $singleView->name?>">
                            </div>
                        </td></tr>

                    <tr><td>Email:</td><td>
                            <div class="form-group">

                                <input type="text" class="form-control" id="usr" name="email" value="<?php echo $singleView->email?>">
                            </div>
                        </td></tr>

                    <tr><td>Password:</td><td>
                            <div class="form-group">
                                <input type="password" class="form-control" id="des" name="password" value="">
                            </div>
                        </td></tr>
                    <tr><td>Police Code:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="age" name="police_code" value="<?php echo $singleView->police_code?>">
                            </div>
                        </td></tr>

                    <tr><td>NID:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="height" name="nid" value="<?php echo $singleView->nid?>">
                            </div>
                        </td></tr>
                    <tr><td>Designation:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="height" name="designation" value="<?php echo $singleView->designation?>">
                            </div>
                        </td></tr>

                    <tr>

                        <td> Thana :</td>

                        <td> <div class="form-group">


                                <select name="thana" class="form-control">
                                    <?php foreach($all_station as $station){ ?>
                                        <option value="<?php $station->station_name ?>"><?php echo
                                            $station->station_name ?></option>
                                    <?php }?>

                            </div>
                        </td>

                    </tr>

                    <tr>

                        <td> City :</td>
                        <td> <div class="form-group">

                                <select name="city" >

                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Comilla">Comilla</option></select>

                            </div>
                        </td>

                    </tr>


                    <tr><td>Gender:</td><td>
                            <div class="column column1"><label>
                                    <input type="radio" name="gender" value="Male" value="Male" name="gender" <?php if($singleView->gender==="Male")echo "checked";  ?> />
                                    <span>Male</span></label>
                                <label><input type="radio" name="gender" value="Female" <?php if($singleView->gender==="Female")echo "checked";  ?>  />
                                    <span>Female</span></label>
                            </div><span class="clearfix"></span>
                        </td></tr>

                    <tr><td>Address:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $singleView->address?>">
                            </div>
                        </td></tr>



                    <tr><td>Postal:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="postal" name="postal" value="<?php echo $singleView->postal?>">
                            </div>
                        </td></tr>
                    <tr><td>Phone:</td><td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $singleView->phone?>">
                            </div>
                        </td></tr>



                    </tbody>
                </table>
                </br>
                <div>
                    <input type="submit" value="Update">
                </div>

            </form>
            <!-- Stop Formoid form-->

        </div>
        <p class="frmd"><a href="http://formoid.com/v29.php">form html</a> Formoid.com 2.9</p><script type="text/javascript" src="../../Resources/formoid_files/formoid1/formoid-solid-blue.js"></script>



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
