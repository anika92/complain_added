<?php
include_once('../../vendor/autoload.php');

use App\Controller\Auth;
use App\Message\Message;
use App\Utility\Utility;
use App\Controller\CrimeType;
use App\Controller\CriminalType;
use App\Controller\RegAdmin;
use App\Controller\CriminalInfo;
$auth= new Auth();
$status= $auth->logged_in();
if($status == TRUE) {
    $fetch=$auth->fetchInfo();
    $_crimetype=new CrimeType();
    $allCrimeType=$_crimetype->index();

    $_criminaltype=new CriminalType();
    $allCriminalType=$_criminaltype->index();
//\App\Utility\Utility::d($allCriminalType);

    $station=new RegAdmin();
    $all_station=$station->indexstation();

    $mp = new CriminalInfo();
    $singleView = $mp->prepare($_GET)->view();
    $crimelist=explode(",",$singleView->crime_type);

    ?>

    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Starter</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../Resources/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
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
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CD</b>MS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>Panel</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->

                        <!-- Tasks Menu -->

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../Resources/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $fetch->name ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../../Resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                       <?php echo $fetch->name ?>

                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../authentication/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../Resources/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $fetch->name ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">HEADER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Police</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="policeall.php">View List</a></li>
                            <li><a href="station.php">Add Station</a></li>
                            <li><a href="police_add.php">Add Police</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Crime Control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="crimeall.php">View List</a></li>
                            <li><a href="../crime_type/crime.php">Manage Crime</a></li>
                            <li><a href="criminal_add.php">Manage Criminals</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="userall.php">View List</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Missing People</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="missingall.php">View List</a></li>

                        </ul>
                    </li>


                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                    <small></small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">

                <link rel="stylesheet" href="../../Resources/formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
                <script type="text/javascript" src="../../Resources/formoid_files/formoid1/jquery.min.js"></script>



                <form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post" action="criminal_update.php" enctype="multipart/form-data">
                    <div class="title"><h2>Criminal Information</h2></div>
                    <input style="display: none;" name="id" type="text" value="<?php echo $singleView->c_id ?>"/>
                    <div class="thumbnail">
                        <img class="img-responsive" src="../../Resources/images/criminals/<?php echo $singleView->image?>" alt="" height="300px" width="400px">
                        <label>Select Image:</label><buttn><input type="file" class="input-group-lg form-control" id="" name="image"></buttn>
                    </div>
                    <div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="name" value="<?php echo $singleView->name ?>"/><span class="icon-place"></span></div></div>

                    <div class="element-multiple">
                        <label class="title"></label>
                        <div class="item-cont"><div class="large">
                                <select name="multiple[]" multiple="multiple" >
                                    <?php
                                    foreach($allCrimeType as $crime_type){ ?>
                                        <option value="<?php echo $crime_type->crime_type ?>" <?php if (in_array($crime_type->crime_type,$crimelist)) echo "selected"?>><?php echo $crime_type->crime_type ?>
                                        </option>
                                    <?php } ?>

                                </select>
                                <span class="icon-place"></span></div></div></div>
<!--                                <select name="multiple[]" multiple="multiple" >-->
<!--
//
<!--                                </select>-->

                    <div class="element-select"><label class="title"></label><div class="item-cont"><div class="large"><span>
                                    <select name="select" >
                                        <?php
                                        foreach($allCriminalType as $criminal_type){

                                            ?>
                                            <option value="<?php echo $criminal_type->c_t_type ?>"><?php echo $criminal_type->c_t_type ?></option>

                                        <?php }?></select><i></i><span class="icon-place"></span></span></div></div></div>
                    <div class="element-number"><label class="title">
                        </label><div class="item-cont">
                            <input class="large" type="text"  name="age" value="<?php echo $singleView->age ?>" />
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="element-number"><label class="title">
                        </label><div class="item-cont">
                            <input class="large" type="text"  name="height" value="<?php echo $singleView->height ?>" />
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <div class="element-textarea"><label class="title"></label><div class="item-cont"><textarea class="medium" name="description" cols="20" rows="5" ><?php echo $singleView->description ?></textarea><span class="icon-place"></span></div></div>
                    <div class="element-radio"><label class="title">Gender</label>
                        <div class="column column1"><label>
                                <input type="radio" name="gender" value="Male" <?php if($singleView->gender=="Male")echo "checked";?> /><span>Male</span></label><label>
                                <input type="radio" name="gender" value="Female" <?php if($singleView->gender=="Female")echo "checked";?> /><span>Female</span></label></div><span class="clearfix"></span>
                    </div>
                    <div class="element-select"><label class="title"></label><div class="item-cont"><div class="large"><span>
                    <select name="station_id" >
                        <?php
                        foreach($all_station as $p_station){

                            ?>
                            <option value="<?php echo $p_station->station_id ?>" <?php if($p_station->station_name==$singleView->station_name)echo "selected" ?>><?php echo $p_station->station_name ?></option>

                        <?php }?></select></select><i></i><span class="icon-place"></span></span></div></div></div>


                    <div class="element-input">
                        <label class="title"></label><div class="item-cont">
                            <input class="large" type="text" name="address" value="<?php echo $singleView->address ?>"/>


                            <span class="icon-place"></span>
                        </div>
                    </div>

                    <div class="element-date"><label class="title">
                        </label><div class="item-cont">
                            <?php $newDate = date("d-m-Y", strtotime($singleView->release_date)); ?>
                             <input type="date" name="date"  class="form-control" id="date" value="<?php echo $newDate ?>" />

                            <span class="icon-place"></span>
                        </div>
                    </div>




                    <div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">jquery form</a> Formoid.com 2.9</p><script type="text/javascript" src="../../Resources/formoid_files/formoid1/formoid-solid-blue.js"></script>


                <script type="text/javascript" src="../../Resources/formoid_files/formoid1/formoid-solid-blue.js"></script>

                <!-- Your Page Content Here -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript::;">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="../../Resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../Resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Resources/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    </body>
    </html>
<?php } ?>