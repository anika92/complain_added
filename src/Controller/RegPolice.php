<?php

namespace App\Controller;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
class RegPolice extends DB
{
    public $id = "";
    public $fullName = "";
    public $email = "";
    public $password = "";
    public $n_id = "";
    public $police_code = "";
    public $designation = "";
    public $thana = "";
    public $address = "";
    public $city = "";
    public $postal = "";
    public $gender = "";
    public $phone = "";
    public $image = "";
    public $status="";
    public $filterByName="";
    public $search="";


    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = Array())
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('name', $data)) {
            $this->fullName = $data['name'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }

        if (array_key_exists('police_code', $data)) {
            $this->police_code = $data['police_code'];
        }
        if (array_key_exists('nid', $data)) {
            $this->n_id = $data['nid'];
        }
        if (array_key_exists('designation', $data)) {
            $this->designation = $data['designation'];
        }


        if (array_key_exists('thana', $data)) {
            $this->thana = ($data['thana']);
            echo $this->thana;
        }

        if (array_key_exists('address', $data)) {
            $this->address = ($data['address']);
        }

        if (array_key_exists('city', $data)) {
            $this->city = ($data['city']);
        }

        if (array_key_exists('postal', $data)) {
            $this->postal = ($data['postal']);
        }

        if (array_key_exists('gender', $data)) {
            $this->gender = ($data['gender']);
        }

        if (array_key_exists('phone', $data)) {
            $this->phone = ($data['phone']);
        }

        if (array_key_exists('image', $data)) {
            $this->image = ($data['image']);
        }
        if (array_key_exists('status', $data)) {
            $this->status = ($data['status']);
        }
        if (array_key_exists("filterByName", $data)) {
            $this->filterByName = $data['filterByName'];
        }

        if (array_key_exists("search", $data)) {
            $this->search = $data['search'];
        }

        return $this;

    }

    public function store()
    {
        $query = "INSERT INTO `criminaldb`.`police_info` (`name`, `email`, `password`, `police_code`, `nid`) VALUES ('" . $this->fullName . "', '" . $this->email . "', '" . $this->password . "', '" . $this->police_code . "', '" . $this->n_id . "')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $lastid = mysqli_insert_id($this->conn);
            $query1 = "INSERT INTO `criminaldb`.`police_profile` (`p_id`,`image`) VALUES ('" . $lastid . "','avatar5.png')";
            $result1 = mysqli_query($this->conn, $query1);
            if ($result1) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
                Utility::redirect('../../views/index.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('../../index.php');

            }
        }
    }
    public function storeByAdmin()
    {
        $query = "INSERT INTO `criminaldb`.`police_info` (`name`, `email`, `password`, `police_code`, `nid`) VALUES ('" . $this->fullName . "', '" . $this->email . "', '" . $this->password . "', '" . $this->police_code . "', '" . $this->n_id . "')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $lastid = mysqli_insert_id($this->conn);
            $query1 = "INSERT INTO `criminaldb`.`police_profile` (`p_id`,`image`) VALUES ('" . $lastid . "','avatar5.png')";
            $result1 = mysqli_query($this->conn, $query1);
            if ($result1) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
                Utility::redirect('policeall.php');

            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('police_add.php');

            }
        }
    }
    public function policestore(){
        $query="INSERT INTO `police_profile` (`designation`, `thana`, `city`, `address`, `postal`, `gender`, `phone`, `image`) VALUES ('".$this->designation."', '".$this->thana."', '".$this->city."', '".$this->address."', '".$this->postal."', '".$this->gender."', '".$this->phone."', '".$this->image."')";
        $result=mysqli_query($this->conn,$query);
        if($result){
           // $query="INSERT INTO `police_info` (`designation`, `thana`, `city`, `address`, `postal`, `gender`, `phone`, `image`) VALUES ('".$this->designation."', '".$this->thana."', '".$this->city."', '".$this->address."', '".$this->postal."', '".$this->gender."', '".$this->phone."', '".$this->image."')";

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
    public function stationlist(){
        $_allpolice= array();
        $query="SELECT * FROM `police_station`";
        $result=mysqli_query($this->conn,$query);
        //$result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allpolice[]=$row;
        }
        return $_allpolice;
    }
    public function policelist(){
        $_allpolice= array();
        $whereClause= " 1=1 ";
        if(!empty($this->filterByName)) {

            $whereClause .= " AND name LIKE '%".$this->filterByName."%'";
        }

        if(!empty($this->search)){
            $whereClause .= " AND name LIKE '%".$this->search."%'";
        }
        $query="SELECT * FROM `police_info` INNER JOIN `police_profile` ON `police_info`.`p_id`=`police_profile`.`p_id` AND " . $whereClause . "";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allpolice[]=$row;
        }
        return $_allpolice;
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `criminaldb`.`police_info` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function policeview()
    {

        $query = "SELECT * FROM `police_info` INNER JOIN `police_profile` ON `police_info`.`p_id`=`police_profile`.`p_id`   WHERE police_info.`p_id`='{$this->id}'";

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;

        }
    }
    public function update(){
        if(!empty($this->image)) {

            $query="UPDATE `police_profile` SET `designation` = '".$this->designation."', `thana` ='".$this->thana."', `city` = '".$this->city."', `address` = '".$this->address."', `postal` = '".$this->postal."',`image` = '".$this->image."', `gender` = '".$this->gender."', `phone` = '".$this->phone."' WHERE `police_profile`.`p_id` =".$this->id;

        }else{
            $query="UPDATE `police_profile` SET `designation` = '".$this->designation."', `thana` ='".$this->thana."', `city` = '".$this->city."', `address` = '".$this->address."', `postal` = '".$this->postal."', `gender` = '".$this->gender."', `phone` = '".$this->phone."' WHERE `police_profile`.`p_id` =".$this->id;
        }

        $result= mysqli_query($this->conn,$query);
        if($result) {
            if($this->password==md5("")) {

                $query2 = "UPDATE `police_info` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`nid`='" . $this->n_id . "',`police_code`='" . $this->police_code . "' WHERE `police_info`.`p_id` ='" . $this->id . "'";
            }
            else{
                $query2 = "UPDATE `police_info` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`password`='" . $this->password . "',`nid`='" . $this->n_id . "',`police_code`='" . $this->police_code . "' WHERE `police_info`.`p_id` ='" . $this->id . "'";
            }

            $result2 = mysqli_query($this->conn, $query2);
            if ($result2) {
                $_SESSION['user_name']=$this->fullName;
                $_SESSION['user_email']=$this->email;
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
                Utility::redirect('../../views/police/welcome.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('../../views/missing_person/missing_index.php');
            }
        }
    }
    public function updatePoliceByAdmin(){



        $query2 = "UPDATE `police_info` SET `name`='" . $this->fullName . "',`email`='" . $this->email . "',`nid`='" . $this->n_id . "',`police_code`='" . $this->police_code . "',`status`='" . $this->status ."' WHERE `police_info`.`p_id` ='" . $this->id . "'";

        $result2 = mysqli_query($this->conn, $query2);
        if ($result2) {

                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Updated.
</div>");
                Utility::redirect('../../views/admin/policeall.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
                Utility::redirect('../../views/admin/policall.php');
            }
        }

    public function countpolice(){
        $query="SELECT COUNT(*) AS totalItem FROM `police_info` INNER JOIN `police_profile` ON `police_info`.`p_id`=`police_profile`.`p_id` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $_allPolice = array();
        $query="SELECT * FROM `police_info` INNER JOIN `police_profile` ON `police_info`.`p_id`=`police_profile`.`p_id` LIMIT ".$pageStartFrom.",".$Limit;
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            $_allPolice[] = $row;
        }

        return $_allPolice;

    }
    public function allName(){
        $_allBook= array();
        $query="SELECT name FROM `police_info` INNER JOIN `police_profile` ON `police_info`.`p_id`=`police_profile`.`p_id`";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $_allBook[]=$row['name'];
        }
        return $_allBook;
    }


}