<?php
include_once('../../vendor/autoload.php');
use App\Controller\CriminalInfo;
use App\Controller\MissingPerson;
use App\Controller\User;
use App\Controller\RegPolice;
$crime= new CriminalInfo();
$a=$crime->count();
$user= new User();
$latestUser=$user->latest();
$b=$user->count();
$miss= new MissingPerson();
$c=$miss->count();
$lates=$miss->latest();
$police=new RegPolice();
$d=$police->count();

?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $a ?></h3>

                <p>Enlisted Criminals</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-contacts"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $d ?> </h3>

                <p>Polices</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker
                "></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $b ?></h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $c ?></h3>

                <p>Missing Persons</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-sad"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->

</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Registered Users</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div style="display: block;" class="box-body no-padding">
                <ul class="users-list clearfix">
                    <?php
                    foreach($latestUser as $alluser){
                        ?>

                        <li>
                            <img src="../../Resources/images/users/<?php echo $alluser->image ?>" alt="User Image">
                            <a class="users-list-name" href="#"><?php echo $alluser->name ?></a>
<!--                            <span class="users-list-date">--><?php //echo $alluser->date?><!--</span>-->
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div style="display: block;" class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Missing Updates</h3>

                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div style="display: block;" class="box-body no-padding">
                <ul class="users-list clearfix">
                    <?php
                    foreach($lates as $all){
                        ?>

                        <li>
                            <img src="../../Resources/images/missing_persons/<?php echo $all->image ?>" alt="User Image">
                            <a class="users-list-name" href="#"><?php echo $all->missing_name ?></a>
                            <span class="users-list-date"><?php echo $all->date?></span>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
        </div>
    </div>
</div>
<!-- jQuery 2.2.3 -->


