<?php
namespace App\Controller;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;

class MissingPerson extends DB
{
    public $id = "";
    public $name = "";

    public $description = "";
    public $age = "";
    public $height="";
    public $gender = "";
    public $image = "";
    public $address = "";
    public $date = "";
    public $date2 = "";
    public $status = "";
    public $staion_id = "";
    public $contact = "";
    public $addedBy = "";
    public $updatedBy = "";
    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data=Array()){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('description',$data)){
            $this->description=$data['description'];
        }

        if(array_key_exists('age',$data)){
            $this->age=$data['age'];
        }
        if(array_key_exists('height',$data)){
            $this->height=$data['height'];
        }
        if(array_key_exists('gender',$data)){
            $this->gender=$data['gender'];
        }
        if(array_key_exists('image',$data)){
            $this->image=$data['image'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }

        if(array_key_exists('date',$data)){
            $this->date=$data['date'];
            if(!$this->date)
            {
                if(array_key_exists('date1',$data)){
                    $this->date=$data['date1'];

                }
            }
        }
        if(array_key_exists('status',$data)){
            $this->status=$data['status'];
        }
        if(array_key_exists('phone',$data)){
            $this->contact=$data['phone'];
        }
        if(array_key_exists('station_name',$data)){
            $this->staion_id=$data['station_name'];
        }
        if(array_key_exists('added_by',$data)){
            $this->addedBy=$data['added_by'];
        }
        if(array_key_exists('updated_by',$data)){
            $this->updatedBy=$data['updated_by'];
        }



        return $this;

    }

    public function store(){
        $query="INSERT INTO `criminaldb`.`missingtable` ( `missing_name`, `description`, `age`,`height` ,`gender`, `image`, `address`,`station_id`,`contact`,`date`) VALUES ( '{$this->name}', '{$this->description}', '{$this->age}', '{$this->height}','{$this->gender}', '{$this->image}','{$this->address}','{$this->staion_id}','{$this->contact}','{$this->date}');";

        $result=mysqli_query($this->conn,$query);
        if($result){

            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Criminal Added Successfully
</div>");
            if($_SESSION['userType']=="Admin"){
                Utility::redirect('../../views/admin/missingall.php');
            }
            if($_SESSION['userType']=="Police"){
                Utility::redirect('../../views/police/welcome.php');
            }


        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            if($_SESSION['userType']=="Admin"){
                Utility::redirect('../../views/admin/missingall.php');
            }
            if($_SESSION['userType']=="Police"){
                Utility::redirect('../../views/police/welcome.php');
            }

        }
    }
//    public  function index(){
//        $_allMissingP=array();
//        $query= "SELECT * FROM `missingtable` ORDER BY `missingtable`.`missing_name`";
//
//        $result= mysqli_query($this->conn,$query);
//        while($row=mysqli_fetch_object($result)){
//            $_allMissingP[]=$row;
//        }
//        return $_allMissingP;
//    }
    public  function index(){
        $_allMissingP=array();
        $query= "SELECT police_station.station_name,missingtable.missing_id, missingtable.missing_name,missingtable.age,missingtable.height,missingtable.description,missingtable.gender,missingtable.address,missingtable.date,missingtable.image,missingtable.contact,missingtable.status FROM missingtable LEFT JOIN police_station ON missingtable.station_id=police_station.station_id ORDER BY `missingtable`.`date` DESC";

        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allMissingP[]=$row;
        }
        return $_allMissingP;
    }

    public  function latest(){
        $_allMissingP=array();
        $query= "SELECT * FROM `missingtable` ORDER BY `missingtable`.`missing_id` DESC LIMIT 8 ";

        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allMissingP[]=$row;
        }
        return $_allMissingP;
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `criminaldb`.`missingtable` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }


    public function updateByAdmin(){
        if(!empty($this->image)) {

            $query="UPDATE `missingtable` SET `missing_name` = '".$this->name."', `description` ='".$this->description."', `age` = '".$this->age."', `height` = '".$this->height."', `gender` = '".$this->gender."',`image` = '".$this->image."', `address` = '".$this->address."', `date` = '".$this->date."', `status` = '".$this->status."' WHERE `missingtable`.`missing_id` =".$this->id;
        }else{
            $query="UPDATE `missingtable` SET `missing_name` = '".$this->name."', `description` ='".$this->description."', `age` = '".$this->age."', `height` = '".$this->height."', `gender` = '".$this->gender."', `address` = '".$this->address."', `date` = '".$this->date."', `status` = '".$this->status."' WHERE `missingtable`.`missing_id` =".$this->id;
        }


        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
            Utility::redirect('../../views/admin/missingall.php');
        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('../../views/admin/missingall.php');
        }
    }
    public function update(){
        if(!empty($this->image)) {

            $query="UPDATE `missingtable` SET `missing_name` = '".$this->name."', `description` ='".$this->description."', `age` = '".$this->age."', `height` = '".$this->height."', `gender` = '".$this->gender."',`image` = '".$this->image."', `address` = '".$this->address."', `date` = '".$this->date."', `status` = '".$this->status."', `station_id` = '".$this->staion_id."' WHERE `missingtable`.`missing_id` =".$this->id;
        }else{
            $query="UPDATE `missingtable` SET `missing_name` = '".$this->name."', `description` ='".$this->description."', `age` = '".$this->age."', `height` = '".$this->height."', `gender` = '".$this->gender."', `address` = '".$this->address."', `date` = '".$this->date."', `status` = '".$this->status."',`station_id` = '".$this->staion_id."' WHERE `missingtable`.`missing_id` =".$this->id;
        }


        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Sucessfully Registered, you can log in now.
</div>");
            Utility::redirect('../../views/missing_person/missing_index.php');
        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('../../views/missing_person/missing_index.php');
        }
    }
    public function view()
    {
        $query = "SELECT police_station.station_name,missingtable.missing_id, missingtable.missing_name,missingtable.age,missingtable.height,missingtable.description,missingtable.gender,missingtable.address,missingtable.date,missingtable.image,missingtable.contact,missingtable.status FROM missingtable LEFT JOIN police_station ON missingtable.station_id=police_station.station_id WHERE `missing_id`=" . $this->id;

        $result = mysqli_query($this->conn, $query);
        if ($result) {
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }

    public function countmiss(){
        $query="SELECT COUNT(*) AS totalItem FROM `missingtable` ";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }
    public function paginator($pageStartFrom=0,$Limit=5){
        $_allBook = array();
        $query="SELECT * FROM `missingtable` LIMIT ".$pageStartFrom.",".$Limit;
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_object($result)) {
            $_allBook[] = $row;
        }

        return $_allBook;

    }
    public function Userstore(){
        $query="INSERT INTO `criminaldb`.`missingtable` ( `missing_name`, `description`, `age`,`height` ,`gender`, `image`, `address`,`station_id`,`contact`,`date`) VALUES ( '{$this->name}', '{$this->description}', '{$this->age}', '{$this->height}','{$this->gender}', '{$this->image}','{$this->address}','{$this->staion_id}','{$this->contact}','{$this->date}');";
        /* echo $query;
         die();*/
        $result=mysqli_query($this->conn,$query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Succesfully enlisted missing person
</div>");
            Utility::redirect('../../views/user/welcome.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been stored successfully.
    </div>");
            Utility::redirect('../../views/user/addmissing.php');

        }
    }

}