<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class RegAdmin extends DB
{
    public $id = "";
    public $fullName = "";
    public $email = "";
    public $password = "";
    public $n_id="";
    public $address="";
    public $gender="";
    public $phone="";
    public $image="";
    public $station="";



    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data=Array()){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('name',$data)){
            $this->fullName=$data['name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }


        if(array_key_exists('nid',$data)){
            $this->n_id=$data['nid'];
        }
        if(array_key_exists('designation',$data)){
            $this->designation=$data['designation'];
        }




        if(array_key_exists('address',$data)){
            $this->address=($data['address']);
        }

        if(array_key_exists('radio',$data)){
            $this->gender=($data['radio']);
        }

        if(array_key_exists('phone',$data)){
            $this->phone=($data['phone']);
        }

        if(array_key_exists('image',$data)){
            $this->image=($data['image']);
        }
        if(array_key_exists('police_station',$data)){
            $this->station=($data['police_station']);
        }
        return $this;

    }

    public function store(){
        $query="INSERT INTO `criminaldb`.`admin` (`name`, `email`, `password`) VALUES ('".$this->fullName."', '".$this->email."', '".$this->password."')";

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
            Utility::redirect('../index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            //Utility::redirect('../../index.php');

        }
    }
    public function stationstore(){
        $query="INSERT INTO `police_station` ( `station_name`) VALUES ( '".$this->station."');";
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Saved.
</div>");
            Utility::redirect('station.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('station.php');

        }
    }

    public function indexstation()
    {
        $_allCrime = array();
        $query = "SELECT * FROM `police_station`";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            $_allCrime[] = $row;
        }
        return $_allCrime;
    }

    public function viewstation(){

        $query="SELECT * from `police_station` WHERE `station_id`='".$this->id."'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }

    public function update_station(){
        $query="UPDATE `police_station` SET `station_name` = '".$this->station."' WHERE `police_station`.`station_id` =".$this->id;
        echo $query;
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Saved.
</div>");
            Utility::redirect('station.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('station.php');

        }
    }
    public function deleteStation(){
        $query="Delete from `criminaldb`.`police_station` where `police_station`.`station_id`='".$this->id."'";

        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been deleted successfully.
</div>");
            Utility::redirect('policeall.php');

        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted.
</div>");
            Utility::redirect('policeall.php');

        }
    }
    public function adminprofview()
    {

        $query="SELECT * FROM `admin` where `id`='".$this->id."'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;

        }
    }
    public function updateAdminProf(){

            if($this->password==md5("")) {

                $query2 = "UPDATE `admin` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "' WHERE `admin`.`id` ='" . $this->id . "'";
            }
            else{
                $query2 = "UPDATE `admin` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`password`='" . $this->password . "' WHERE `admin`.`id` ='" . $this->id . "'";
            }

            $result2 = mysqli_query($this->conn, $query2);
            if ($result2) {
                $_SESSION['user_name']=$this->fullName;
                $_SESSION['user_email']=$this->email;
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Updated
</div>");
                Utility::redirect('welcome.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been updatd successfully.
    </div>");
                Utility::redirect('welcome.php');
            }
        }


//    public function adminstore(){
//        $query="INSERT INTO `police_profile` (`designation`, `thana`, `city`, `address`, `postal`, `gender`, `phone`, `image`) VALUES ('".$this->designation."', '".$this->thana."', '".$this->city."', '".$this->address."', '".$this->postal."', '".$this->gender."', '".$this->phone."', '".$this->image."')";
//        $result=mysqli_query($this->conn,$query);
//        if($result){
//            Message::message("<div class=\"alert alert-success\">
//  <strong>Success!</strong> Sucessfully Registered, you can log in now.
//</div>");
//            Utility::redirect('../../index.php');
//
//        } else {
//            Message::message("<div class=\"alert alert-danger\">
//  <strong>Error!</strong> Data has not been stored successfully.
//    </div>");
//            Utility::redirect('../../index.php');
//
//        }
//    }

}