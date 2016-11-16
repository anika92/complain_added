<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class User extends DB
{
    public $id = "";
    public $fullName = "";
    public $email = "";
    public $password = "";
    public $n_id="";
    public $thana="";
    public $address="";
    public $city="";
    public $postal="";
    public $gender="";
    public $phone="";
    public $image="";




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

        if(array_key_exists('nid',$data)){
            $this->n_id=$data['nid'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('thana',$data)){
            $this->thana=($data['thana']);
        }

        if(array_key_exists('address',$data)){
            $this->address=($data['address']);
        }

        if(array_key_exists('city',$data)){
            $this->city=($data['city']);
        }

        if(array_key_exists('postal',$data)){
            $this->postal=($data['postal']);
        }

        if(array_key_exists('gender',$data)){
            $this->gender=($data['gender']);
        }

        if(array_key_exists('phone',$data)){
            $this->phone=($data['phone']);
        }

        if(array_key_exists('image',$data)){
            $this->image=($data['image']);
        }




        return $this;

    }

    public function store(){
        $query="INSERT INTO `criminaldb`.`user_info` (`name`, `email`, `nid`, `password`) VALUES ('".$this->fullName."', '".$this->email."', '".$this->n_id."', '".$this->password."')";

        $result=mysqli_query($this->conn,$query);

        if ($result) {
            $lastid = mysqli_insert_id($this->conn);
            $query1 = "INSERT INTO `criminaldb`.`user_profile` (`user_id`,`image`) VALUES ('" . $lastid . "','avatar04.png')";

            $result1 = mysqli_query($this->conn, $query1);
            if ($result1) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
                Utility::redirect('../../index.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('../../index.php');

            }
        }
    }

    public function userstore(){
        $query="INSERT INTO `criminaldb`.`user_profile` (`address`, `city`, `thana`, `postal`, `gender`, `phone`, `image`) VALUES ('".$this->address."', '".$this->city."', '".$this->thana."', '".$this->postal."', '".$this->gender."', '".$this->phone."', '".$this->image."')";
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
            Utility::redirect('../../index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('../../index.php');

        }
    }
    public function userlist(){
        $_alluser= array();
        $query="SELECT * FROM `user_info` INNER JOIN `user_profile` ON `user_info`.`user_id`=`user_profile`.`user_id`";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_alluser[]=$row;
        }
        return $_alluser;
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `criminaldb`.`user_info` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public  function latest(){
        $_allMissingP=array();
        $query= "SELECT * FROM `user_info`INNER JOIN `user_profile` ON `user_info`.`user_id`=`user_profile`.`user_id`  ORDER BY `user_info`.`user_id` DESC LIMIT 8 ";

        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allMissingP[]=$row;
        }
        return $_allMissingP;
    }
    public function userview()
    {

        $query = "SELECT * FROM `user_info` INNER JOIN `user_profile` ON `user_info`.`user_id`=`user_profile`.`user_id`   WHERE user_info.`user_id`='{$this->id}'";

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;

        }
    }
    public function countuser(){
        $query="SELECT COUNT(*) AS totalItem FROM `user_info` INNER JOIN `user_profile` ON `user_info`.`user_id`=`user_profile`.`user_id`";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $_allBook = array();
        $query="SELECT * FROM `user_info` INNER JOIN `user_profile` ON `user_info`.`user_id`=`user_profile`.`user_id` LIMIT ".$pageStartFrom.",".$Limit;
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            $_allBook[] = $row;
        }

        return $_allBook;

    }


    public function update(){
        if(!empty($this->image)) {

            $query="UPDATE `user_profile` SET `thana` ='".$this->thana."', `city` = '".$this->city."', `address` = '".$this->address."', `postal` = '".$this->postal."',`image` = '".$this->image."', `gender` = '".$this->gender."', `phone` = '".$this->phone."' WHERE `user_profile`.`user_id` =".$this->id;

        }else{
            $query="UPDATE `user_profile` SET `thana` ='".$this->thana."', `city` = '".$this->city."', `address` = '".$this->address."', `postal` = '".$this->postal."', `gender` = '".$this->gender."', `phone` = '".$this->phone."' WHERE `user_profile`.`user_id` =".$this->id;;
        }


        $result= mysqli_query($this->conn,$query);
        if($result) {
            if($this->password==md5("")) {

                $query2 = "UPDATE `user_info` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`nid`='" . $this->n_id . "' WHERE `user_info`.`user_id` ='" . $this->id . "'";
            }
            else{
                $query2 = "UPDATE `user_info` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`password`='" . $this->password . "',`nid`='" . $this->n_id . "' WHERE `user_info`.`user_id` ='" . $this->id . "'";
            }


            $result2 = mysqli_query($this->conn, $query2);
            if ($result2) {
                $_SESSION['user_name']=$this->fullName;
                $_SESSION['user_email']=$this->email;
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully updated
</div>");
                Utility::redirect('../../views/user/welcome.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('../../views/user/user_edit.php');
            }
        }
    }
}